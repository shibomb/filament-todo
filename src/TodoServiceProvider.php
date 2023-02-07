<?php

namespace Shibomb\FilamentTodo;

use Filament\PluginServiceProvider;
use Shibomb\FilamentTodo\Commands\InstallCommand;
use Shibomb\FilamentTodo\Resources\CategoryResource;
use Shibomb\FilamentTodo\Resources\TodoResource;
use Spatie\LaravelPackageTools\Package;

class TodoServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        CategoryResource::class,
        TodoResource::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-todo')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasCommand(InstallCommand::class)
            ->hasMigration('create_filament_todo_tables');
    }
}
