<?php

namespace Shibomb\FilamentTodo\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Shibomb\FilamentTodo\Resources\CategoryResource;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
