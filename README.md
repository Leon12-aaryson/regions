# Regions Laravel Package

This package provides an API and tools for accessing regional data such as countries, states, and cities for Laravel applications.

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

Add this to your main Laravel project's `composer.json`:

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

## API Usage

After installing and migrating, you can fetch regional data via HTTP:

- `GET /api/regions/countries` – List all countries
- `GET /api/regions/states?country_id=1` – List states for a country
- `GET /api/regions/cities?state_id=1` – List cities for a state

Example (using curl):

```bash
curl http://your-app.test/api/regions/countries
```

## Directory Structure

- `src/RegionServiceProvider.php` – Registers publishing, routes, and commands
- `src/Console/PublishAndSeedRegions.php` – The one-command installer
- `src/database/migrations/` – Migration files
- `src/database/seeders/` – Seeder files
- `src/config/regions.php` – (Optional) Config file

## Updating the Package

To update the package and re-run the installer, run:

```bash
composer update vendor/regions
php artisan regions:install
```

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

**Email:** <aaronoluk4deleonardo@gmail.com>
