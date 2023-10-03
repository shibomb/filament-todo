<?php

namespace Shibomb\FilamentTodo;

use Shibomb\FilamentTodo\Resources\TodoResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentTodoPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-todo';
    }

    public function register(Panel $panel): void
    {
        //
        $panel->resources([
            TodoResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
