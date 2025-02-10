<?php declare(strict_types=1);

namespace Soyhuce\LivewireComponentAutoRegister;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Soyhuce\LivewireComponentAutoRegister\Commands\LivewireComponentAutoRegisterCommand;

class LivewireComponentAutoRegisterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('livewire-component-auto-register')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_livewire_component_auto_register_table')
            ->hasCommand(LivewireComponentAutoRegisterCommand::class);
    }
}
