<?php

namespace App\Providers;

use App\Services\Contracts\DataImporterInterface;
use App\Services\RandomUserImporter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DataImporterInterface::class, RandomUserImporter::class);
    }
}
