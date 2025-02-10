<?php declare(strict_types=1);

namespace Soyhuce\LivewireComponentAutoRegister;

use Composer\ClassMapGenerator\ClassMapGenerator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Livewire;

class ComponentRegistrar
{
    public function register(): void
    {
        foreach ($this->getComponents() as $class => $component) {
            Livewire::component($component, $class);
        }
    }

    /**
     * @return array<class-string, string>
     */
    private function getComponents(): array
    {
        if (file_exists(base_path('bootstrap/cache/livewire-components-auto-register.php'))) {
            return require base_path('bootstrap/cache/livewire-components-auto-register.php');
        }

        return $this->resolveComponents();
    }

    /**
     * @return array<class-string, string>
     */
    private function resolveComponents(): array
    {
        return new Collection(config('livewire-component-auto-register.paths'))
            ->flatMap(function (string $path, string $namespace): Collection {
                return new Collection(ClassMapGenerator::createMap($path))
                    ->keys()
                    ->filter(fn (string $class) => class_exists($class))
                    ->filter(fn (string $class) => is_subclass_of($class, Component::class))
                    ->mapWithKeys(fn (string $class) => [
                        $class => Str::of($class)
                            ->after($namespace)
                            ->explode('\\')
                            ->map(fn (string $segment) => Str::kebab($segment))
                            ->join('.'),
                    ]);
            })
            ->all();
    }
}
