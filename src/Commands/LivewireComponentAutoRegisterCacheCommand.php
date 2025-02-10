<?php declare(strict_types=1);

namespace Soyhuce\LivewireComponentAutoRegister\Commands;

use Illuminate\Console\Command;
use Soyhuce\LivewireComponentAutoRegister\ComponentRegistrar;

class LivewireComponentAutoRegisterCacheCommand extends Command
{
    public $signature = 'livewire-component-auto-register:cache';

    public $description = 'Cache the Livewire components auto-registration';

    public function handle(): int
    {
        new ComponentRegistrar()->cache();

        return self::SUCCESS;
    }
}
