
import requests
import xmltodict
import json
import csv
import xml.etree.ElementTree as ET
import pandas as pd
import os
import argparse
from datetime import datetime, timedelta
from openpyxl import load_workbook
import smtplib
import mimetypes
from email.message import EmailMessage
from dotenv import load_dotenv
import gspread
from google.oauth2.service_account import Credentials
from gspread.exceptions import SpreadsheetNotFound, WorksheetNotFound

load_dotenv()
 
SMTP_USERNAME = os.getenv("AWS_SES_SMTP_USERNAME")
SMTP_PASSWORD = os.getenv("AWS_SES_SMTP_PASSWORD")
SMTP_HOST = os.getenv("AWS_SES_SMTP_HOST")
SMTP_PORT = int(os.getenv("AWS_SES_SMTP_PORT", 587))
SENDER_EMAIL = os.getenv("SES_SENDER_EMAIL")
TO_EMAILS = os.getenv("SES_TO_EMAILS").split(",")
SES_BCC_EMAILS=os.getenv("SES_BCC_EMAILS").split(",")
VITELGLOBAL_USERNAME = os.getenv("VITELGLOBAL_USERNAME")
VITELGLOBAL_PASSWORD = os.getenv("VITELGLOBAL_PASSWORD")

CSV_ORDER = [
        "Name",
        "extention",
        
        "callstatus",
        "src",
        "dst",
        "extension",
        "extname",
        "billsec",
        "disposition","calldate"
    ]

def fetch_recuriter_log(Name: str  ,extcode: str ,startDate: str, endDate: str  ):
        URL = "https://billing.vitelglobal.com/vitelglobal_callrecords.php?username="+ VITELGLOBAL_USERNAME +"&password="+VITELGLOBAL_PASSWORD+"&line="+extcode+"&startdate="+startDate+"&enddate="+endDate+""  
        HEADERS = {"Accept": "application/xml"}  # add Authorization if needed

        resp = requests.get(URL, headers=HEADERS, timeout=60)
        resp.raise_for_status()

        # 1) XML -> Python dict
        xml_dict = resp.text
        print(xml_dict)
        #print(xml_dict)
        # (Optional) Save JSON for debugging/verification 

        # ---------- Static columns ----------
        STATIC_COLUMNS = {
            "Name": Name,
            "extention":extcode
            
        }

        # ---------- Parse XML ----------
        # 2) Find the repeating “row” node (you may need to adjust this)
        # Example guesses: xml_dict["response"]["items"]["item"] 
        root = ET.fromstring(xml_dict)

        total = root.findtext("totalnoofrecords", default="0")
        record_elems = root.findall("record")

        # Convert each <record> to dict
        records = []
        for rec in record_elems:
            
            row = {child.tag: (child.text or "").strip() for child in rec}
            
          #  records.append(row)
        # Add static columns to each row
            row.update(STATIC_COLUMNS) 
            
            records.append(row)
        # Build JSON structure (root + metadata)
        json_obj = {
            "callrecords": {
                "totalnoofrecords": int(total) if total.isdigit() else total,
                "records": records
            }
        }

        if os.path.exists(os.getenv("CALLLOG_ROOT")+"recuritor_log_download/"+Name+"_"+extcode+".json"):
                os.remove(os.getenv("CALLLOG_ROOT")+"recuritor_log_download/"+Name+"_"+extcode+".json")
        if os.path.exists(os.getenv("CALLLOG_ROOT")+"recuritor_log_download/"+Name+"_"+extcode+".csv"):
                os.remove(os.getenv("CALLLOG_ROOT")+"recuritor_log_download/"+Name+"_"+extcode+".csv")
        with open(os.getenv("CALLLOG_ROOT")+"recuritor_log_download/"+Name+"_"+extcode+".json", "w", encoding="utf-8") as jf:
            json.dump(json_obj, jf, ensure_ascii=False, indent=2)

        # Save CSV (records only)
        if records:
            fieldnames = list(records[0].keys())  # keeps the same order as XML
            with open(os.getenv("CALLLOG_ROOT")+"recuritor_log_download/"+Name+"_"+extcode+".csv", "w", newline="", encoding="utf-8") as cf:
                writer = csv.DictWriter(cf, fieldnames=CSV_ORDER)
                writer.writeheader()
                writer.writerows(records)
        # else:
        #     # create an empty CSV if no records
        #     with open(os.getenv("CALLLOG_ROOT")+"recuritor_log_download/"+Name+"_"+extcode+".csv", "w", newline="", encoding="utf-8") as cf:
        #         writer = csv.DictWriter(cf, fieldnames=CSV_ORDER)
        #         writer.writeheader()
        #         empty=[]
        #         empty.append(Name)
        #         empty.append(extcode)
        #         empty.append(Name)#,extcode,"No Call Records"]
        #         writer.writerows([{"Name":Name,"extention":extcode,"disposition":"NO Records"}])

def merge_recuriters_logs(Name: str ,extcode: str ,startDate: str ,endDate: str ):
        
                recuriter_log_df = pd.read_csv(os.getenv("CALLLOG_ROOT")+"recuritor_log_download/"+Name+"_"+extcode+".csv")
                recuriter_file = os.getenv("CALLLOG_ROOT")+"recuritor_log_download/"+Name+"_"+extcode+".csv"
                output_file = os.getenv("CALLLOG_ROOT")+"excel_files/Recuritors"+"_"+startDate+".xlsx"
                
                #recuriter_log_df = pd.read_csv("recuritor_log_download/"+Name+"_"+extcode+".csv")
                #recuriter_file = "recuritor_log_download/"+Name+"_"+extcode+".csv"
                #output_file = "excel_files/Recuritors.xlsx"

                # ✅ Add Date column (same value for all rows)
                #[x[-3:] for x in arr]
                #print(len(recuriter_log_df["calldate"]))
                #recuriter_log_df["DateFieldAdded"] = pd.to_datetime(    recuriter_log_df["calldate"], errors="coerce").dt.date
                recuriter_log_df.insert(    0,     "Date",     recuriter_log_df["calldate"].astype(str).str[:10])
               
                #print(sample)
                #sheet_name = Name + "_" + extcode
                sheet_name = "Call_Logs"
                #print("recuriter_file :", recuriter_file)
                #print("recuriter_file Exits :", os.path.exists(recuriter_file))
                #print("Start Date  :", startDate)
                if not os.path.exists(output_file):
                    with pd.ExcelWriter(output_file, engine="openpyxl", mode="w") as writer:
                        recuriter_log_df.to_excel(writer, sheet_name=sheet_name, index=False)
                    print("Created new file and sheet")

                else:
                    # ✅ File exists
                    book = load_workbook(output_file)
                    if sheet_name in book.sheetnames:
                        # Sheet exists → append
                        startrow = book[sheet_name].max_row

                        with pd.ExcelWriter(
                            output_file,
                            engine="openpyxl",
                            mode="a",
                            if_sheet_exists="overlay"
                        ) as writer:
                            recuriter_log_df.to_excel(
                                writer,
                                sheet_name=sheet_name,
                                index=False,
                                header=False,   # Don't write header again
                                startrow=startrow
                            )
                        print("Appended to existing sheet")
                    else:
                        # Sheet does not exist → create it
                        with pd.ExcelWriter(
                            output_file,
                            engine="openpyxl",
                            mode="a"
                        ) as writer:
                            recuriter_log_df.to_excel(
                                writer,
                                sheet_name=sheet_name,
                                index=False
                            )
                        print("Created new sheet in existing file")

                #print(f"Total in XML: {total}")
                #print(f"Records written: {len(records)}")
                #print("Created: response.json, response.csv")

def send_excel_via_ses_smtp(smtp_host,smtp_port,smtp_username,smtp_password,sender_email,to_emails,attachment_path,startDate,endDate):
    formatted_date = startDate.strftime("%B %d, %Y")
    #print(formatted_date)
    if not os.path.exists(attachment_path):
        raise FileNotFoundError(f"Attachment not found: {attachment_path}")
    
    subject="Call Log Summary – Recruiters "+ str(formatted_date) 
    body_text="""Dear Team,

I hope you are doing well.

Please find attached the Recruiter Call Logs Data for """+str(formatted_date) +""". This report includes details of recruiter outreach activities, candidate calls, and follow-up status calls for the day.

Kindly review the information and let me know if any additional details or updates are required.

Thank you.

Best regards,"""
    msg = EmailMessage()
    msg["Subject"] = subject
    msg["From"] = sender_email
    msg["To"] = ", ".join(to_emails)
    msg["BCC"] = ", ".join(SES_BCC_EMAILS)
    msg.set_content(body_text)

    # Attach file
    ctype, encoding = mimetypes.guess_type(attachment_path)
    if ctype is None or encoding is not None:
        ctype = "application/octet-stream"
    maintype, subtype = ctype.split("/", 1)

    with open(attachment_path, "rb") as f:
        msg.add_attachment(
            f.read(),
            maintype=maintype,
            subtype=subtype,
            filename=os.path.basename(attachment_path),
        )

    # Connect + send
    with smtplib.SMTP(smtp_host, smtp_port, timeout=30) as server:
        server.ehlo()
        server.starttls()
        server.ehlo()
        server.login(smtp_username, smtp_password)
        server.send_message(msg)

def googlesheet_upload(startdate,googleCredentials,googlesheetName):
        
        scope = [
        "https://www.googleapis.com/auth/spreadsheets",
        "https://www.googleapis.com/auth/drive"
    ]

        # Load credentials
        creds = Credentials.from_service_account_file(
            os.getenv("CALLLOG_ROOT")+"google_account/"+googleCredentials,
            scopes=scope
        )

        client = gspread.authorize(creds)


        # Open existing Google Sheet by name
        #spreadsheet = client.open("Recuritors_Call_Logs")

        # OR open by URL
        spreadsheet = client.open_by_url(googlesheetName)

        # Add new sheet
        #spreadsheet.add_worksheet(title="2026-02-16", rows="1000", cols="20")

        worksheet = spreadsheet.worksheet("Call_Logs")  # Change to your sheet name
        df = pd.read_excel(os.getenv("CALLLOG_ROOT")+"excel_files/Recuritors"+"_"+str(startdate)+".xlsx", sheet_name="Call_Logs")
        #df = pd.read_excel("excel_files/Recuritors.xlsx", sheet_name="Recuritors_Call_Logs")
        # ✅ Fix NaN issue
        df = df.fillna("")
        # Convert DataFrame to list of lists
        data = df.values.tolist()
        # Append rows at bottom
        worksheet.append_rows(data)

        print("Sheet Updated successfully!")


def main(startdate, enddate):
        print(startdate,enddate)
        df = pd.read_excel(os.getenv("CALLLOG_ROOT")+"excel_files/Phone_Book.xlsx", sheet_name="Phone_Book")
        output_file = os.getenv("CALLLOG_ROOT")+"excel_files/Recuritors.xlsx"
        if os.path.exists(output_file):
                      os.remove(output_file)
        #df = pd.read_excel("excel_files/Phone_Book.xlsx", sheet_name="Phone_Book")
        print(f"Start Date : {startdate}")

        for index, row in df.iterrows():
            #if index == 4:
                #print(f"index : {index}")
                Name = row["Alias"]
                extcode = str(row["Ext"])

                #print(f"Name : {Name}")
                #print(f"Ext : {extcode}")
                #print(f"Start Date : {startdate}")
                #print(f"End Date : {enddate}")

                fetch_recuriter_log(Name,extcode,str(startdate),str(enddate))
                recuriter_file = os.getenv("CALLLOG_ROOT")+"recuritor_log_download/"+Name+"_"+extcode+".csv"
                #recuriter_file = "recuritor_log_download/"+Name+"_"+extcode+".csv"

                if os.path.exists(recuriter_file):
                    merge_recuriters_logs(Name,extcode,str(startdate),str(enddate))
                    print(f"Calls Logs Merged")
                else : 
                     print(f"No Calls Logs ")
        startdate2=str(startdate)
        attachment_output_file = os.getenv("CALLLOG_ROOT")+"excel_files/Recuritors"+"_"+startdate2+".xlsx"
        googlesheet_upload(startdate,"credentials_old.json","https://docs.google.com/spreadsheets/d/1FjVjalWnQXW6f_IBBc5AovWMUBM0ya77jIDbR2V8Ie0/edit?gid=0#gid=0")
        googlesheet_upload(startdate,"credentials_new.json","https://docs.google.com/spreadsheets/d/1b7_ZXBkCu12lAUOa2PZUknrBTfMDxvEv2Bw5mnUAJgg/edit?gid=0#gid=0")
        send_excel_via_ses_smtp(SMTP_HOST,SMTP_PORT,SMTP_USERNAME,SMTP_PASSWORD,SENDER_EMAIL,TO_EMAILS,attachment_output_file,startdate,enddate)

if __name__ == "__main__":

    today = datetime.today().date() #- timedelta(days=1)
    yesterday = today # - timedelta(days=2)

    parser = argparse.ArgumentParser(description="Process call logs")
    
    parser.add_argument(
        "--startdate",
        type=lambda d: datetime.strptime(d, "%Y-%m-%d").date(),
        default=yesterday,
        help="Start date (YYYY-MM-DD). Default: today"
    )

    parser.add_argument(
        "--enddate",
        type=lambda d: datetime.strptime(d, "%Y-%m-%d").date(),
        default=today,
        help="End date (YYYY-MM-DD). Default: yesterday"
    )

    args = parser.parse_args()

    main(args.startdate, args.enddate)
    


