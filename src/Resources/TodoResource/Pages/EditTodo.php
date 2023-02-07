<?php

namespace Shibomb\FilamentTodo\Resources\TodoResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Shibomb\FilamentTodo\Resources\TodoResource;

class EditTodo extends EditRecord
{
    protected static string $resource = TodoResource::class;
}
