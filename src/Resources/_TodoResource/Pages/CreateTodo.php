<?php

namespace Shibomb\FilamentTodo\Resources\TodoResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Shibomb\FilamentTodo\Resources\TodoResource;

class CreateTodo extends CreateRecord
{
    protected static string $resource = TodoResource::class;
}
