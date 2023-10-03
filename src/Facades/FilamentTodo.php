<?php

namespace Shibomb\FilamentTodo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Shibomb\FilamentTodo\FilamentTodo
 */
class FilamentTodo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Shibomb\FilamentTodo\FilamentTodo::class;
    }
}
