<?php

namespace Shibomb\FilamentTodo\Resources;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Shibomb\FilamentMultiComponentsColumn\Components\MultiComponentsColumn;
use Shibomb\FilamentTodo\Models\Category;
use Shibomb\FilamentTodo\Resources\CategoryResource\Pages;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $slug = 'todo/categories';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Todo';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('filament-todo::filament-todo.category_name'))
                            ->required(),
                        Forms\Components\ColorPicker::make('color')
                            ->label(__('filament-todo::filament-todo.color'))
                            ->required(),
                        Forms\Components\TextInput::make('sort_order')
                            ->label(__('filament-todo::filament-todo.sort_order'))
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(1000000),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                MultiComponentsColumn::make('name')
                    ->label(__('filament-todo::filament-todo.category_name'))
                    ->searchable()
                    ->sortable()
                    ->components([
                        Tables\Columns\ColorColumn::make('color'),
                        Tables\Columns\TextColumn::make('name'),
                    ]),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label(__('filament-todo::filament-todo.sort_order'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('sort_order');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-todo::filament-todo.categories');
    }

    public static function getModelLabel(): string
    {
        return __('filament-todo::filament-todo.category');
    }
}
