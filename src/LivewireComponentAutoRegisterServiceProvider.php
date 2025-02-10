<?php declare(strict_types=1);

namespace Soyhuce\LivewireComponentAutoRegister;

use Illuminate\Support\ServiceProvider;
use Soyhuce\LivewireComponentAutoRegister\Commands\LivewireComponentAutoRegisterClearCacheCommand;
use Soyhuce\LivewireComponentAutoRegister\Commands\LivewireComponentIdeHelperCommand;
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
            ->hasCommand(LivewireComponentAutoRegisterCacheCommand::class)
        ->hasCommand(LivewireComponentAutoRegisterClearCacheCommand::class)
        ->hasCommand(LivewireComponentIdeHelperCommand::class);
    }

    public function packageBooted(): void
    {
        if($this->app->runningInConsole()) {
            $this->optimizes(
                LivewireComponentAutoRegisterCacheCommand::class,
                LivewireComponentAutoRegisterClearCacheCommand::class,
                'livewire components auto-register'
            );
        }

        new ComponentRegistrar()->register();
    }
}
