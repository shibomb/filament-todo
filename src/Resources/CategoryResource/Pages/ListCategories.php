<?php

namespace Shibomb\FilamentTodo\Resources\CategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Shibomb\FilamentTodo\Resources\CategoryResource;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
