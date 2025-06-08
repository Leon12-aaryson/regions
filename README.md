# Regions Laravel Package

This package provides an API and tools for accessing regional data such as countries, regions, states, cities, districts, and villages for Laravel applications.

## Features

- Publish and run migrations and seeders for regional data
- Easily integrate with Laravel 10 and above
- Publish configuration and routes
- One-command setup for migrations and seeders

## Installation

You can install this package in three ways:

### 1. Install via Packagist (Composer)

```bash
composer require vendor/regions
```

### 2. Install Directly from GitHub

Add the repository to your Laravel project's `composer.json`:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/Leon12-aaryson/regions"
    }
]
```

Then require the package (replace `main` with your branch if needed):

```bash
composer require vendor/regions:dev-main
```

### 3. Use Locally (Development)

Clone or copy this package into a directory (e.g. `packages/vendor/regions`) in your Laravel project.

Add the local path to your Laravel project's `composer.json`:

```json
"repositories": [
    {
        "type": "path",
        "url": "packages/vendor/regions"
    }
]
```

Then require it:

```bash
composer require vendor/regions:dev-main
```

---

## Usage

### 1. Publish and Run Migrations & Seeders

Run the following Artisan command to publish migrations and seeders, run migrations, and seed the database:

```bash
php artisan regions:install
```

This command will:

- Publish the package's migrations to your app's `database/migrations` directory
- Publish the package's seeders to your app's `database/seeders` directory
- Run the migrations
- Seed the database with regional data

### 2. Manual Publishing (Optional)

If you want to publish only migrations or seeders:

```bash
php artisan vendor:publish --tag=regions-migrations
php artisan vendor:publish --tag=regions-seeders
```

### 3. Configuration

If the package provides a config file, you can publish it with:

```bash
php artisan vendor:publish --tag=regions-config
```

## Directory Structure

- `src/RegionServiceProvider.php` – Registers publishing, routes, and commands
- `src/Console/PublishAndSeedRegions.php` – The one-command installer
- `src/database/migrations/` – Migration files
- `src/database/seeders/` – Seeder files
- `src/config/regions.php` – (Optional) Config file

## Requirements

- PHP 8.2 or higher
- Laravel 10, 11, or 12

## Extending

You can add your own migrations or seeders to the published directories as needed.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

[MIT](LICENSE)

---

**Author:** Leon12-aaryson
**Email:** aaronoluk4deleonardo@gmail.com