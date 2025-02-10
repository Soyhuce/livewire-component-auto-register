
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireComponentsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
@foreach($components as $class => $name)
        Livewire::component("{{ $name }}", \{{ $class }}::class);
@endforeach
    }
}

