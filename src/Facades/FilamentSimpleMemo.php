<?php

namespace Shibomb\FilamentSimpleMemo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Shibomb\FilamentSimpleMemo\FilamentSimpleMemo
 */
class FilamentSimpleMemo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Shibomb\FilamentSimpleMemo\FilamentSimpleMemo::class;
    }
}
