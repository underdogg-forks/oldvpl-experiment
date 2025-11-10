# InvoicePlane Development Guidelines for PhpStorm

## Project Information

**Project:** InvoicePlane v2.0.0 Alpha  
**Framework:** Laravel 5.5  
**PHP Version:** >= 7.0.0  
**Type:** Self-hosted invoicing application

## IDE Configuration

### PHP Interpreter
- Set minimum PHP version to 7.0
- Enable PSR-2 code style
- Enable PHP inspections

### Laravel Plugin
- Install Laravel Plugin for PhpStorm
- Enable Laravel support in settings
- Set Laravel version to 5.5

### Code Style

#### PHP
- **Standard:** PSR-2
- **Line Length:** 120 characters
- **Indentation:** 4 spaces
- **Namespace:** `IP\` for app code, `Addons\` for custom addons

#### Blade Templates
- **Indentation:** 4 spaces
- **Line Length:** 120 characters

#### JavaScript
- **Standard:** ES6+
- **Indentation:** 2 spaces
- **Line Length:** 120 characters

#### SASS/CSS
- **Indentation:** 2 spaces
- **BEM naming** for custom classes

## File Structure

```
app/                    # Application code (IP\ namespace)
├── Http/               # Controllers, Middleware, Requests
├── Events/             # Event classes
├── Composers/          # View composers
└── Support/            # Helper classes

config/                 # Configuration files
database/               # Migrations, seeds, factories
public/                 # Web root (point web server here)
├── assets/             # Compiled assets (auto-generated, don't edit)
└── index.php           # Entry point

resources/
├── assets/             # Source assets
│   ├── sass/           # SASS source files
│   └── js/             # JavaScript source files
└── views/              # Blade templates

custom/
├── addons/             # Custom addon modules
└── overrides/          # Core file overrides
```

## Coding Standards

### PHP

#### Namespaces and Use Statements
```php
<?php

namespace IP\Http\Controllers;

use Illuminate\Http\Request;
use IP\Models\Invoice;
```

#### Class Structure
```php
class InvoiceController extends Controller
{
    /**
     * Display a listing of invoices.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Implementation
    }
}
```

#### Type Hinting
- Use type hints for parameters and return types where possible
- Use nullable types when appropriate (`?string`, `?int`)

#### DocBlocks
- Add DocBlocks for all classes, methods, and properties
- Include `@param`, `@return`, and `@throws` tags
- Use PHPDoc type hints

### Blade Templates

#### Syntax
```blade
@extends('layouts.master')

@section('content')
    <div class="container">
        @foreach($items as $item)
            <p>{{ $item->name }}</p>
        @endforeach
    </div>
@endsection
```

#### Best Practices
- Use `{{ }}` for escaped output
- Use `{!! !!}` only for trusted HTML
- Use `@csrf` for forms
- Use `@auth`, `@guest` for authentication checks

### JavaScript

#### Modern Syntax
```javascript
// Use const/let instead of var
const items = [];
let counter = 0;

// Arrow functions
items.forEach(item => {
    console.log(item);
});

// Template literals
const message = `Hello, ${name}!`;
```

#### jQuery (existing codebase)
```javascript
// Document ready
$(function() {
    // Initialize
});

// Event handling
$('.btn-submit').on('click', function(e) {
    e.preventDefault();
    // Handle click
});
```

## Database Conventions

### Migrations
```php
Schema::create('invoices', function (Blueprint $table) {
    $table->increments('id');
    $table->unsignedInteger('client_id');
    $table->string('invoice_number');
    $table->decimal('total', 10, 2);
    $table->timestamps();
    $table->softDeletes();

    $table->foreign('client_id')
          ->references('id')
          ->on('clients')
          ->onDelete('cascade');
});
```

### Models
```php
namespace IP\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_id', 'invoice_number', 'total'];
    
    protected $casts = [
        'total' => 'decimal:2',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
```

## Useful PhpStorm Features

### Code Templates

#### Live Templates
- `route` → Route definition
- `mig` → Migration class
- `model` → Eloquent model
- `cont` → Controller class

### Navigation
- **Ctrl+Click** on class/method name to navigate
- **Ctrl+B** to go to declaration
- **Ctrl+Alt+B** to go to implementation
- **Ctrl+Shift+N** to find file by name
- **Ctrl+Shift+F** to find in files

### Refactoring
- **Shift+F6** to rename
- **Ctrl+Alt+M** to extract method
- **Ctrl+Alt+V** to extract variable
- **Ctrl+Alt+C** to extract constant

## Build & Asset Compilation

### NPM Scripts
- `npm run dev` - Development build
- `npm run production` - Production build (minified)
- `npm run watch` - Watch mode (auto-recompile)

### Asset Locations
- **Source:** `resources/assets/`
- **Output:** `public/assets/` (auto-generated, ignore in VCS)

## Debugging

### Laravel Debugging
- Use `dd()` for dump and die
- Use `dump()` for dump without stopping
- Use `logger()` for logging
- Check `storage/logs/laravel.log`

### Database Queries
```php
// Enable query log
DB::enableQueryLog();

// Your queries here

// Get executed queries
dd(DB::getQueryLog());
```

### Xdebug Setup
1. Install Xdebug extension
2. Configure PhpStorm debugger
3. Set breakpoints
4. Start listening for PHP debug connections

## Testing

### Running Tests
```bash
# All tests
vendor/bin/phpunit

# Specific test
vendor/bin/phpunit tests/Unit/ExampleTest.php

# With coverage
vendor/bin/phpunit --coverage-html coverage
```

### Writing Tests
```php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_invoice()
    {
        $response = $this->post('/invoices', [
            'client_id' => 1,
            'invoice_number' => 'INV-001',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('invoices', [
            'invoice_number' => 'INV-001',
        ]);
    }
}
```

## Git Workflow

### Commit Messages
- Use present tense: "Add feature" not "Added feature"
- Be descriptive but concise
- Reference issue numbers when applicable

### Branch Naming
- `feature/description` - New features
- `bugfix/description` - Bug fixes
- `hotfix/description` - Urgent fixes
- `refactor/description` - Code refactoring

## Common Pitfalls

### Avoid
- ❌ Modifying files in `vendor/` directory
- ❌ Editing compiled assets in `public/assets/`
- ❌ Hardcoding values that should be in config
- ❌ Using raw SQL queries (use query builder/Eloquent)
- ❌ Committing `.env` file or sensitive credentials

### Do
- ✅ Use migrations for database changes
- ✅ Use Eloquent ORM for database operations
- ✅ Validate all user input
- ✅ Use CSRF protection on forms
- ✅ Keep controllers thin, move logic to services
- ✅ Write tests for new features
- ✅ Use dependency injection

## Resources

- [Laravel 5.5 Docs](https://laravel.com/docs/5.5)
- [PSR-2 Coding Standard](https://www.php-fig.org/psr/psr-2/)
- [PhpStorm Laravel Plugin](https://plugins.jetbrains.com/plugin/7532-laravel)
- [InvoicePlane Community](https://community.invoiceplane.com/)
