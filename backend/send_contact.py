from __future__ import annotations

import json
import re
import sys
from pathlib import Path

from env_loader import load_env
from mail_service import send_contact_email


PROJECT_ROOT = Path(__file__).resolve().parent.parent

load_env(PROJECT_ROOT / ".env")


def response(ok: bool, message: str) -> None:
    print(
        json.dumps(
            {
                "ok": ok,
                "message": message,
            }
        )
    )


def validate_email(value: str) -> bool:
    return bool(
        re.fullmatch(
            r"[^@\s]+@[^@\s]+\.[^@\s]+",
            value,
        )
    )


def main() -> int:

    try:
        raw = sys.stdin.read()

        if not raw:
            response(
                False,
                "No contact information received.",
            )
            return 1

        data = json.loads(raw)

        name = str(
            data.get("name", "")
        ).strip()

        phone = str(
            data.get("phone", "")
        ).strip()

        email = str(
            data.get("email", "")
        ).strip()

        purpose = str(
            data.get("purpose", "")
        ).strip()

        website = str(
            data.get("website", "")
        ).strip()


        # Honeypot
        if website:
            response(
                True,
                "Thank you. Your request has been sent.",
            )
            return 0


        if not name:
            response(
                False,
                "Please enter your name.",
            )
            return 1


        if not phone:
            response(
                False,
                "Please enter your phone number.",
            )
            return 1


        if not email:
            response(
                False,
                "Please enter your email address.",
            )
            return 1


        if not validate_email(email):
            response(
                False,
                "Please enter a valid email address.",
            )
            return 1


        if not purpose:
            response(
                False,
                "Please enter the purpose of your visit.",
            )
            return 1


        send_contact_email(
            name=name,
            phone=phone,
            email=email,
            purpose=purpose,
        )


        response(
            True,
            "Thank you. Your request has been sent successfully.",
        )

        return 0


    except json.JSONDecodeError:
        response(
            False,
            "Invalid request data.",
        )

        return 1


    except Exception as exc:

        print(
            f"Contact mail error: {exc}",
            file=sys.stderr,
        )

        response(
            False,
            "Unable to send your request. Please try again.",
        )

        return 1


if __name__ == "__main__":
    raise SystemExit(main())