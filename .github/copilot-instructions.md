# GitHub Copilot Instructions for InvoicePlane

## Project Overview

InvoicePlane is a self-hosted open source invoicing application built with Laravel 5.5. This is version 2.0.0 Alpha, based on FusionInvoice 2018-8.

## Technology Stack

- **Framework:** Laravel 5.5
- **PHP Version:** >= 7.0.0
- **Database:** MySQL/MariaDB
- **Frontend Build:** Laravel Mix (Webpack)
- **CSS Framework:** Bootstrap 4 + CoreUI
- **JavaScript Libraries:** jQuery, jQuery UI, Moment.js

## Code Style & Standards

### PHP
- Follow PSR-2 coding standards
- Use meaningful variable and function names
- Add PHPDoc comments for classes and methods
- Namespace: `IP\` for application code, `Addons\` for custom addons

### JavaScript
- Use ES6+ syntax where possible
- Keep global namespace clean
- Use jQuery for DOM manipulation (existing codebase convention)

### CSS/SASS
- Follow BEM naming convention for custom styles
- Place custom styles in `resources/assets/sass/_custom.scss`
- Use Bootstrap variables for consistency

## Project Structure

```
InvoicePlane/
├── app/                      # Application code (namespace: IP\)
│   ├── Http/                 # Controllers, Middleware, Requests
│   ├── Events/               # Event classes
│   ├── Composers/            # View composers
│   └── Support/              # Helper classes
├── config/                   # Configuration files
├── database/                 # Migrations, seeds, factories
├── public/                   # Document root (web server points here)
│   ├── assets/               # Compiled assets (auto-generated)
│   └── index.php             # Application entry point
├── resources/
│   ├── assets/               # Source assets (SASS, JS)
│   │   ├── sass/             # SASS files
│   │   └── js/               # JavaScript source files
│   └── views/                # Blade templates
├── custom/                   # Custom addons and overrides
│   ├── addons/               # Custom addon modules
│   └── overrides/            # Override core files
├── storage/                  # Application storage (logs, cache, uploads)
└── webpack.mix.js            # Laravel Mix configuration
```

## Development Workflow

### Asset Compilation

- **Source files:**
  - SASS: `resources/assets/sass/`
  - JavaScript: `resources/assets/js/`

- **Build commands:**
  - Development: `npm run dev`
  - Production: `npm run production`
  - Watch mode: `npm run watch`

- **Output:** Compiled assets go to `public/assets/`

### Adding Dependencies

1. **JavaScript:** Add to `resources/assets/js/dependencies.js` and rebuild
2. **PHP:** Use `composer require package/name`
3. **CSS/SASS:** Import in appropriate SASS file

### Database Changes

- Create migrations: `php artisan make:migration description`
- Run migrations: `php artisan migrate`
- Rollback: `php artisan migrate:rollback`

## Important Conventions

### Views
- Located in `resources/views/`
- Use Blade templating engine
- Naming: `controller.action.blade.php`

### Routes
- Defined in `routes/web.php`
- Use resourceful routing where appropriate

### Controllers
- Located in `app/Http/Controllers/`
- One controller per resource (recommended)
- Return views or JSON responses

### Models
- Follow Laravel's Eloquent ORM conventions
- Define relationships clearly
- Use accessors and mutators for data transformation

### Events & Listeners
- Events in `app/Events/`
- Listeners in `app/Listeners/`
- Register in `app/Providers/EventServiceProvider.php`

## Custom Features

### Addons System
- Custom addons go in `custom/addons/`
- Use namespace `Addons\YourAddon\`
- Follow PSR-4 autoloading

### Overrides
- File overrides in `custom/overrides/`
- Avoid modifying core files directly

### Multi-Company Support
- Application supports multiple company profiles
- Be mindful of company context in queries

## Testing

- Run tests: `php artisan test` or `vendor/bin/phpunit`
- Test location: `tests/`
- Write tests for new features

## Security Considerations

- Always validate and sanitize user input
- Use Laravel's built-in CSRF protection
- Use query builder or Eloquent to prevent SQL injection
- Never expose sensitive configuration in version control

## Common Tasks

### Adding a New Feature
1. Create migration for database changes
2. Create/update models
3. Create controller and routes
4. Create views
5. Add necessary assets
6. Write tests
7. Update documentation

### Modifying Styles
1. Edit SASS files in `resources/assets/sass/`
2. Run `npm run dev` or `npm run watch`
3. Test changes in browser

### Debugging
- Enable debug mode in `.env`: `APP_DEBUG=true`
- Check logs in `storage/logs/`
- Use Laravel Telescope (if installed) for deeper insights

## Resources

- [Laravel 5.5 Documentation](https://laravel.com/docs/5.5)
- [Bootstrap 4 Documentation](https://getbootstrap.com/docs/4.1/)
- [CoreUI Documentation](https://coreui.io/docs/)
- [InvoicePlane Community](https://community.invoiceplane.com/)

## Getting Help

- Community Forums: https://community.invoiceplane.com/
- Development Wiki: https://devwiki.invoiceplane.com/
- Issue Tracker: https://development.invoiceplane.com/
