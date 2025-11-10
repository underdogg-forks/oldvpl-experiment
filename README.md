![InvoicePlane](http://invoiceplane.com/content/logo/PNG/logo_300x150.png)
#### _Version 2.0.0 Alpha 1_

[![Travis-CI Build Status](https://travis-ci.com/InvoicePlane/InvoicePlane.svg?branch=v2.0.0)](https://travis-ci.com/InvoicePlane/InvoicePlane) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/846787effdab46fa88dc8880dd3fce94)](https://www.codacy.com/app/InvoicePlane/InvoicePlane) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/InvoicePlane/InvoicePlane/badges/quality-score.png?b=v2.0.0)](https://scrutinizer-ci.com/g/InvoicePlane/InvoicePlane/?branch=v2.0.0) [![Crowdin](https://d322cqt584bo4o.cloudfront.net/invoiceplane/localized.svg)](https://translations.invoiceplane.com/project/invoiceplane)

InvoicePlane is a self-hosted open source application for managing your invoices, clients and payments.    
For more information visit __[InvoicePlane.com](https://invoiceplane.com)__ or try the __[demo](https://demo.invoiceplane.com)__.

---

:warning: **Notice about this version**

This version is the official successor of FusionInvoice and based on the latest version 2018-8. However, it
is marked as an alpha version because we plan to restructure and update the application and add new features.  
You can use this application but expect breaking changes until we announce InvoicePlane 2 as a stable version.

More information can be found in [this announcement](https://community.invoiceplane.com/t/topic/6299).

---

### Quick Installation

#### Prerequisites

- PHP >= 7.0.0
- MySQL/MariaDB database
- Composer
- Node.js and npm
- A web server (Apache/Nginx)

#### Installation Steps

1. **Clone or download the repository:**
   ```bash
   git clone https://github.com/InvoicePlane/InvoicePlane.git
   cd InvoicePlane
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies and build assets:**
   ```bash
   npm install
   npm run production
   ```
   For development with auto-recompiling assets:
   ```bash
   npm run watch
   ```

4. **Configure your database:**
   - Copy `.env.example` to `.env`
   - Open `config/database.php` and set your database credentials
   - Or configure database settings in `.env` file

5. **Set up web server:**
   - Configure your web server to point to the `public` directory
   - For Apache, ensure mod_rewrite is enabled
   - The `.htaccess` files are already configured

6. **Set permissions:**
   ```bash
   chmod -R 755 storage
   chmod -R 755 bootstrap/cache
   ```

7. **Run the setup:**
   - Open `http://your-domain.com/index.php/setup` in your browser
   - Follow the installation wizard

---

### Development

#### Building Assets

This project uses Laravel Mix for asset compilation:

- **Development build:** `npm run dev`
- **Production build:** `npm run production`
- **Watch mode:** `npm run watch` (auto-recompiles on file changes)

#### Asset Structure

- Source assets are in `resources/assets/`
- Compiled assets are output to `public/assets/`
- JavaScript dependencies: `resources/assets/js/dependencies.js`
- Stylesheets: `resources/assets/sass/`

#### File Structure

```
InvoicePlane/
├── app/                 # Application code
├── bootstrap/           # Framework bootstrap
├── config/              # Configuration files
├── database/            # Database migrations and seeds
├── public/              # Web server document root
│   ├── assets/          # Compiled assets (CSS, JS, images)
│   └── index.php        # Application entry point
├── resources/           # Views and source assets
│   ├── assets/          # Source SASS and JS files
│   └── views/           # Blade templates
├── storage/             # Application storage
├── vendor/              # PHP dependencies
└── webpack.mix.js       # Laravel Mix configuration
```

---

### Support / Development / Chat

Need some help or want to talk with other about InvoicePlane? Follow these links to get in touch.

#### For Users

[![Wiki](https://img.shields.io/badge/Help%3A-Official%20Wiki-429ae1.svg)](https://wiki.invoiceplane.com/)  
[![Community Forums](https://img.shields.io/badge/Help%3A-Community%20Forums-429ae1.svg)](https://community.invoiceplane.com/)  
[![Slack Chat](https://img.shields.io/badge/Development%3A-Slack%20Chat-429ae1.svg)](https://invoiceplane-slack.herokuapp.com/)  
[![Roadmap](https://img.shields.io/badge/Development%3A-Roadmap-429ae1.svg)](https://go.invoiceplane.com/roadmapv1)  

#### For Developers

[![Development Wiki](https://img.shields.io/badge/Development%3A-Wiki-429ae1.svg)](https://devwiki.invoiceplane.com/)  
[![Issue Tracker](https://img.shields.io/badge/Development%3A-Issue%20Tracker-429ae1.svg)](https://development.invoiceplane.com/)  

---

### Security Vulnerabilities

If you discover a security vulnerability please send an e-mail to mail@invoiceplane.com before disclosing the vulnerability to the public.
All security vulnerabilities will be promptly addressed.

---

> _The name 'InvoicePlane' and the InvoicePlane logo are both copyright by Kovah.de and InvoicePlane.com
and their usage is restricted! For more information visit invoiceplane.com/license-copyright_
