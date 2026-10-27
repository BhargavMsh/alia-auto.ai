ALIA Standalone PHP Homepage
============================

Requirements:
- PHP 7.4+ (PHP 8.x recommended)

Run locally:
  php -S localhost:8080 -t .

Then open:
  http://localhost:8080/

Files:
- index.php                 Standalone server-rendered homepage
- assets/css/home.css       Homepage styling
- assets/js/home.js         Mobile menu only; no React dependency
- assets/images/*           ALIA/AITA assets

Important:
- This page does NOT require React, Vite, Node, npm, or the existing JS bundle.
- Sign In points to https://app.alia-auto.ai/signin.
- Pricing is currently rendered as static PHP markup. Connect it to the existing public pricing API after visual/content approval.
- Contact email in this first build is info@alia-auto.ai; change it if a different mailbox is required.
