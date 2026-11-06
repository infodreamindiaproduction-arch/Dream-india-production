# All in One HRMS — external WordPress preview

Open [the WordPress preview](https://playground.wordpress.net/?blueprint-url=https%3A%2F%2Fraw.githubusercontent.com%2Finfodreamindiaproduction-arch%2FDream-india-production%2Fcodex%2Fhrms-wordpress-preview%2Fhrms%2Fpublic-preview%2Fblueprint.json).

Preview login: `hrms_admin` / `CheckHRMS2026!`

These are intentionally public credentials for an isolated browser preview. They do not provide access to the development or production database. Each viewer gets a separate WordPress/PHP/SQLite installation with an empty Dream India Production workspace. Enter test records only. Keep the preview open while checking it; use Playground's save/export controls if you want to keep the test site. This is not permanent hosting or a shared production database.

The Blueprint installs the code-only v7.2.0 theme, sets All in One HRMS branding, creates the preview administrator, and opens the protected portal. The package contains no database dump, private documents, employee records or production credentials. First opening requires the browser to download WordPress and PHP. Outbound PHP networking and email delivery are disabled in this preview.

Verified using the official Playground CLI with PHP 8.3, WordPress 6.8.3 and SQLite: login, company creation, Super Admin → company Admin → employee accounts, company isolation, pricing permissions, attendance/leave saves, payroll finalisation, own-record exports, font/language persistence and navigation. The public Blueprint selects the supported WordPress 6.8 release line. The permanent MariaDB installation was tested separately and retains its original data.

`all-in-one-hrms.zip` is the installable WordPress theme consumed by the Blueprint. It includes the theme source and local PDF/Excel libraries, embedded English/Hindi fonts and their licence notices. Do not install this preview's public login credentials on a production site. Production needs its own HTTPS WordPress host, database, private credentials, backups and configured mail transport.
