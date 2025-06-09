<?php

namespace Vendor\Regions\Console;

use Illuminate\Console\Command;

class ShowComposerScript extends Command
{
    protected $signature = 'regions:show-script';
    protected $description = 'Show the composer script to add for one-step update/install';

    public function handle()
    {
        $this->info('Add the following to your main Laravel project\'s composer.json "scripts" section:');
        $this->line('');
        $this->line('    "regions-update": [');
        $this->line('        "composer update vendor/regions",');
        $this->line('        "php artisan regions:install"');
        $this->line('    ]');
        $this->line('');
        $this->info('Then run: composer regions-update');
    }
}