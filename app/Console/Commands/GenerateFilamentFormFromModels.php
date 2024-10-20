<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenerateFilamentFormFromModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-filament-form-from-models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $models = array_map('basename', glob(app_path('Models/*.php')));
        $models = array_map(fn ($model) => str_replace('.php', '', $model), $models);

        foreach ($models as $model) {
            // call a command to generate a form for each model
            Artisan::call('make:filament-resource', [
                'name' => $model . 'Resource',
                '--generate' => true,
                '--panel' => 'admin',
            ]);
        }
    }
}
