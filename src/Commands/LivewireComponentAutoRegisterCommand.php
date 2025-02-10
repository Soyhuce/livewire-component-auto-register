<?php declare(strict_types=1);

namespace Soyhuce\LivewireComponentAutoRegister\Commands;

use Illuminate\Console\Command;

class LivewireComponentAutoRegisterCommand extends Command
{
    public $signature = 'livewire-component-auto-register';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
