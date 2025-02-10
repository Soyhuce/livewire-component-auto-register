<?php declare(strict_types=1);

namespace Soyhuce\LivewireComponentAutoRegister\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Soyhuce\LivewireComponentAutoRegister\LivewireComponentAutoRegister
 */
class LivewireComponentAutoRegister extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Soyhuce\LivewireComponentAutoRegister\LivewireComponentAutoRegister::class;
    }
}
