# Copilot Instructions for InvoicePlane

## Project Overview

InvoicePlane is a self-hosted open source application for managing invoices, clients, and payments. This version (2.0.0 Alpha 1) is built on Laravel 5.5 and is the official successor of FusionInvoice.

**Technology Stack:**
- **Backend:** PHP 7.0+ with Laravel 5.5 framework
- **Frontend:** Bootstrap 4, jQuery, CoreUI
- **Build Tools:** Composer (PHP dependencies), NPM (JavaScript dependencies), Grunt (asset compilation)
- **Database:** MySQL (configured via Doctrine DBAL)

## Code Style Guidelines

### PHP
- Follow **PSR-1** and **PSR-2** standards for all PHP code
- Use `$under_score` formatting for variables and functions, NOT `$camelCase`
- Use short array syntax: `['item', 'item2']` instead of `array('item', 'item2')`
- Code is checked using PHPCS with PSR-2 ruleset (see `phpcs.xml`)

### JavaScript
- Follow Standard JavaScript Code Formatting (https://standardjs.com/)
- **Use semicolons** (differs from standard)
- Main scripts are located in the assets directory

### CSS/Styles
- Write styles in **Sass (SCSS syntax)**
- Do NOT add vendor prefixes manually (autoprefixer handles this during compilation)
- Core styles are managed in this repository
- Theme-specific styles belong in the InvoicePlane-Themes repository

## Project Structure

```
app/              - Application code (PSR-4: IP\)
custom/addons/    - Custom addons (PSR-4: Addons\)
assets/           - Source SCSS and JS files
resources/        - Views and language files
config/           - Laravel configuration files
database/         - Migrations, seeds, and factories
tests/            - PHPUnit tests (Feature and Unit)
storage/          - Application storage (must be writable)
```

## Development Workflow

### Installing Dependencies

**PHP Dependencies:**
```bash
composer install
```

**JavaScript Dependencies:**
```bash
npm install
```

### Building Assets

**Development mode** (with watch):
```bash
grunt dev
```

**Production build** (minified):
```bash
grunt build
```

### Running Tests

**PHPUnit Tests:**
```bash
vendor/bin/phpunit
```

**Code Style Check:**
```bash
vendor/bin/phpcs
```

### Environment Setup

1. Copy `.env.example` to `.env`
2. Configure database credentials in `config/database.php` or `.env`
3. Ensure `storage/` directory and subdirectories are writable
4. Run application setup via `http://your-domain.com/index.php/setup`

## Contribution Guidelines

### Version Control

- Uses **SemVer** (Semantic Versioning)
- Bugfixes → minor versions (e.g., v1.5.6)
- New features → feature versions (e.g., v1.6.0)
- Development happens on version-specific branches (e.g., `v1.6.0`, `v2.0.0`)
- Never commit directly to `master` branch

### Before Contributing

1. Check the [issue tracker](https://development.invoiceplane.com) for existing issues
2. Reference issue IDs in all commits (e.g., "IP-317: Fix invoice calculation")
3. Rebase from the target branch before creating pull requests
4. Ensure code follows style guidelines
5. Run tests and linters before submitting

## Key Dependencies

**Backend:**
- Laravel Framework 5.5
- Doctrine DBAL (database abstraction)
- DomPDF (PDF generation)
- Payment integrations: Stripe, PayPal, Mollie

**Frontend:**
- Bootstrap 4 & CoreUI
- jQuery, jQuery UI
- Chosen.js (select enhancement)
- Bootstrap DatePicker
- Moment.js (date handling)

## Testing

- Tests are in `tests/` directory
- Two test suites: Feature and Unit
- Configuration in `phpunit.xml`
- Test environment uses array drivers for cache/session/queue

## Important Notes

- This is an **alpha version** - expect breaking changes
- The application requires a web server with PHP 7.0+
- Ensure proper file permissions for `storage/` directory
- Database configuration is in `config/database.php`
- The application is based on FusionInvoice 2018-8

## Getting Help

- [Official Wiki](https://wiki.invoiceplane.com/)
- [Community Forums](https://community.invoiceplane.com/)
- [Development Wiki](https://devwiki.invoiceplane.com/)
- [Slack Channel](https://invoiceplane-slack.herokuapp.com/)
