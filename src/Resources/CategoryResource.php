<?php

namespace Shibomb\FilamentTodo\Resources;

use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Shibomb\FilamentTodo\Models\Category;
use Shibomb\FilamentTodo\Resources\CategoryResource\Pages;
use Shibomb\FilamentTodo\Resources\CategoryResource\RelationManagers;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    public static function getPluralLabel(): string
    {
        return trans('filament-todo::filament-todo.resource.category.label');
    }

    public static function getLabel(): string
    {
        return trans('filament-todo::filament-todo.resource.category.single');
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-todo.navigation.category.group') ? trans(config('filament-todo.navigation.category.group')) : false;
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-todo.navigation.category.icon') ?? 'heroicon-o-tag';
    }

    public static function getNavigationLabel(): string
    {
        return trans('filament-todo::filament-todo.navigation.category.label');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-todo.navigation.category.sort') ?? 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('filament-todo::filament-todo.resource.category.name'))
                            ->required()
                            ->columnSpan('full'),
                        Forms\Components\ColorPicker::make('color')->label(__('filament-todo::filament-todo.resource.category.color'))->required(),
                        Forms\Components\TextInput::make('sort_order')->label(__('filament-todo::filament-todo.resource.category.sort_order'))->required()->numeric()->minValue(0)->maxValue(1000000),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(trans('filament-todo::filament-todo.resource.category.name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ColorColumn::make('color')
                    ->label(trans('filament-todo::filament-todo.resource.category.color')),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label(trans('filament-todo::filament-todo.resource.category.sort_order'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\TodosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            // 'view' => Pages\ViewCategory::route('/{record}'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
