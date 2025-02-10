<?php declare(strict_types=1);

namespace Soyhuce\LivewireComponentAutoRegister;

use Illuminate\Support\ServiceProvider;
use Soyhuce\LivewireComponentAutoRegister\Commands\LivewireComponentAutoRegisterClearCacheCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Soyhuce\LivewireComponentAutoRegister\Commands\LivewireComponentAutoRegisterCacheCommand;

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
            ->hasCommand(LivewireComponentAutoRegisterCacheCommand::class);

        $this->optimizes(
            LivewireComponentAutoRegisterCacheCommand::class,
            LivewireComponentAutoRegisterClearCacheCommand::class,
            'livewire components auto-register'
        );
    }

    public function packageBooted(): void
    {
        new ComponentRegistrar()->register();
    }
}
