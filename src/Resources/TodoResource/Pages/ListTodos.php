<?php

namespace Shibomb\FilamentTodo\Resources\TodoResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Shibomb\FilamentTodo\Resources\TodoResource;

class ListTodos extends ListRecords
{
    protected static string $resource = TodoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
