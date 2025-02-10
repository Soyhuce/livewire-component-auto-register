<?php declare(strict_types=1);

namespace Soyhuce\LivewireComponentAutoRegister\Commands;

use Composer\ClassMapGenerator\ClassMapGenerator;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\Mechanisms\ComponentRegistry;
use Soyhuce\LivewireComponentAutoRegister\ComponentRegistrar;

class LivewireComponentIdeHelperCommand extends Command
{
    public $signature = 'livewire-component:ide-helper';

    public $description = 'Generate an IDE helper file to help Laravel idea to find and auto-complete the components';

    public function handle(): int
    {
        $view = view('livewire-component-auto-register::ide-helper', [
            'components' => $this->getComponents(),
        ]);

        File::put(
            config('livewire-component-auto-register.ide-helper.file'),
            <<<PHP
            <?php

            {$view->render()}
            PHP
        );

        return self::SUCCESS;
    }

    /**
     * @return array<class-string, string>
     */
    protected function getComponents(): array
    {
        return [
            ...$this->livewireComponents(),
            ...new ComponentRegistrar()->getComponents(),
        ];
    }

    /**
     * @return array<class-string, string>
     */
    protected function livewireComponents(): array
    {
        $generator = new ClassMapGenerator();
        $generator->scanPaths(config('livewire-component-auto-register.ide-helper.scan-path'));

        return new Collection($generator->getClassMap()->getMap())
            ->keys()
            ->filter(fn (string $class) => str_starts_with($class, config('livewire.class_namespace')))
            ->filter(fn (string $class) => class_exists($class))
            ->filter(fn (string $class) => is_subclass_of($class, Component::class))
            ->mapWithKeys(fn (string $class) => [
                $class => app(ComponentRegistry::class)->getName($class),
            ])
            ->all();
    }
}
