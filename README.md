# Laravel Regions Composer Package

This package provides an API and database structure for regional data, including countries, states, cities, districts, and villages, for use in Laravel applications.

---

## Step 1: Set Up Your Package Structure

1. **Create the Package Directory**

    ```bash
    mkdir laravel-regions
    cd laravel-regions
    ```

2. **Initialize Composer**

    ```bash
    composer init
    ```

    Fill in the details as prompted (e.g., name: `vendor/regions`).

3. **Directory Structure**

    ```bash
    mkdir -p src/database/migrations
    mkdir src
    ```

---

## Step 2: Create Migration Files

Create migration files in `src/database/migrations/` for each table.

**Example: `2023_10_01_000000_create_countries_table.php`**

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('shortname');
            $table->string('name');
            $table->string('phonecode');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
```

Repeat for `states`, `cities`, `districts`, `villages`, or use a single `regions` table as needed.

---

## Step 3: Create the Service Provider

Create `RegionServiceProvider.php` in `src/`:

```php
<?php

namespace Vendor\Regions;

use Illuminate\Support\ServiceProvider;

class RegionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {
        // Register package services if needed
    }
}
```

---

## Step 4: Update `composer.json`

Ensure your `composer.json` looks like this:

```json
{
    "name": "vendor/regions",
    "description": "This package provides an api that helps developers to have access to regional data in form of countries, regions, states, cities, districts and villages",
    "type": "library",
    "require": {
        "illuminate/support": "^10.0",
        "illuminate/database": "^10.0"
    },
    "autoload": {
        "psr-4": {
            "Vendor\\Regions\\": "src/"
        }
    },
    "extra": {
        "laravel": {
            "providers": [
                "Vendor\\Regions\\RegionServiceProvider"
            ]
        }
    },
    "authors": [
        {
            "name": "Leon12-aaryson",
            "email": "aaronoluk4deleonardo@gmail.com"
        }
    ]
}
```

Run:

```bash
composer dump-autoload
```

---

## Step 5: Install the Package in Laravel

1. **Install the Package**  
    In your Laravel application, require your package (from Packagist, GitHub, or local path):

    ```bash
    composer require vendor/regions
    ```

2. **Run Migrations**  

    ```bash
    php artisan migrate
    ```

---

## Step 6: Seed the Database (Optional)

If you have data, create a seeder in `src/database/seeders/`.

**Example: `CountriesTableSeeder.php`**

```php
<?php

namespace Vendor\Regions\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        $countries = [
            ['shortname' => 'US', 'name' => 'United States', 'phonecode' => '1'],
            ['shortname' => 'CA', 'name' => 'Canada', 'phonecode' => '1'],
            // Add more countries as needed
        ];

        DB::table('countries')->insert($countries);
    }
}
```

**Run the Seeder:**

```bash
php artisan db:seed --class=Vendor\\Regions\\Database\\Seeders\\CountriesTableSeeder
```

---

## Step 7: Expand Your Package

- Add Eloquent models in `src/Models/`.
- Add controllers, routes, and API resources as needed.
- Write tests in a `tests/` directory.

---

## Conclusion

You now have a Composer package for managing regions in Laravel, complete with migrations and optional seeding.  
Expand this package by adding more features, such as models, controllers, and routes, depending on your application's requirements.
