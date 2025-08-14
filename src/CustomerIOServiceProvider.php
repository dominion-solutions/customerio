<?php

namespace DominionSolutions\CustomerIO;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use DominionSolutions\CustomerIO\Commands\CustomerIOCommand;

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
