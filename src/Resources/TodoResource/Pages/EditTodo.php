<?php

namespace Shibomb\FilamentTodo\Resources\TodoResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Shibomb\FilamentTodo\Resources\TodoResource;

class EditTodo extends EditRecord
{
    protected static string $resource = TodoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
