# All in One HRMS — external WordPress preview

Open [the WordPress preview](https://playground.wordpress.net/?blueprint-url=https%3A%2F%2Fraw.githubusercontent.com%2Finfodreamindiaproduction-arch%2FDream-india-production%2Fcodex%2Fhrms-wordpress-preview%2Fhrms%2Fpublic-preview%2Fblueprint.json).

| Role | Username | Password |
| --- | --- | --- |
| Super Admin | `hrms_admin` | `CheckHRMS2026!` |
| Employee (TEST001) | `hrms_employee` | `Employee2026!` |

These are intentionally public credentials for an isolated browser preview. They do not provide access to the development or production database. Each viewer gets a separate WordPress/PHP/SQLite installation with a Dream India Production workspace and one fictional **Test Employee** profile. The employee's example salary is test data. Enter test records only. Keep the preview open while checking it; use Playground's save/export controls if you want to keep the test site. This is not permanent hosting or a shared production database.

The Blueprint installs the code-only v7.2.2 theme, sets All in One HRMS branding, creates both preview logins, and opens the protected portal. `setup-preview.php` is the source embedded in its final step; it is excluded from the theme package. The package contains no database dump, private documents, real employee records or production credentials. First opening requires the browser to download WordPress and PHP. Outbound PHP networking and email delivery are disabled in this preview; live WordPress hosting and mail configuration are still required for enquiries to reach productiondreamindia@gmail.com.

The header displays a live clock with seconds and a date in the device's local time zone. English/Hindi formatting follows the portal language. The clock works in both administrator and employee portals and survives tab navigation without duplicating itself or shifting the saved scroll position. It is a display clock and never writes attendance or payroll records.

Verified using the official Playground CLI with PHP 8.3, WordPress 6.8.3 and SQLite: login, company creation, Super Admin → company Admin → employee accounts, company isolation, pricing permissions, attendance/leave saves, payroll finalisation, own-record exports, font/language persistence and navigation. The public Blueprint selects the supported WordPress 6.8 release line. The permanent MariaDB installation was tested separately and retains its original data.

`all-in-one-hrms.zip` is the installable WordPress theme consumed by the Blueprint. It includes the theme source and local PDF/Excel libraries, embedded English/Hindi fonts and their licence notices. Do not install this preview's public login credentials on a production site. Production needs its own HTTPS WordPress host, database, private credentials, backups and configured mail transport.

Employee and company Admin logins enter the HRMS workspace even when using plain wp-login.php or a wp-admin bookmark. An explicit own-profile/password link still works; Super Admin retains WordPress administration. Verified with actual successful and failed logins, direct/explicit/external redirect targets, own-record API permissions, AJAX/admin-post and company Admin access.
