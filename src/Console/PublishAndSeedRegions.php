<?php
namespace Vendor\Regions\Console;

use Illuminate\Console\Command;

class PublishAndSeedRegions extends Command
{
    protected $signature = 'regions:install';
    protected $description = 'Publish migrations and seeders, run migrations and seed the regions data';

    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'regions-migrations', '--force' => true]);
        $this->call('vendor:publish', ['--tag' => 'regions-seeders', '--force' => true]);
        $this->call('migrate');
        $this->call('db:seed', [
            '--class' => 'Vendor\Regions\Database\Seeders\CountriesTableSeeder'
        ]);
        $this->info('Regions package installed and seeded!');
    }
}