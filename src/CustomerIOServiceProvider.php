<?php

namespace DominionSolutions\CustomerIO;

use DominionSolutions\CustomerIO\Commands\CustomerIOCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CustomerIOServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('customerio')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_customerio_table')
            ->hasCommand(CustomerIOCommand::class);
    }
}
