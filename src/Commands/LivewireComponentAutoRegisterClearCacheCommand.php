<?php declare(strict_types=1);

namespace Soyhuce\LivewireComponentAutoRegister\Commands;

use Illuminate\Console\Command;
use Soyhuce\LivewireComponentAutoRegister\ComponentRegistrar;

class LivewireComponentAutoRegisterClearCacheCommand extends Command
{
    public $signature = 'livewire-component-auto-register:clear-cache';

    public $description = 'Clear the Livewire components auto-registration cache';

    public function handle(): int
    {
        new ComponentRegistrar()->clearCache();

        return self::SUCCESS;
    }
}
