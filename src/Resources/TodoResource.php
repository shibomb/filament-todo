<?php

namespace Shibomb\FilamentTodo\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Shibomb\FilamentTodo\Models\Todo;
use Shibomb\FilamentTodo\Resources\TodoResource\Pages;

class TodoResource extends Resource
{
    protected static ?string $model = Todo::class;

    public static function getPluralLabel(): string
    {
        return trans('filament-todo::todo.resource.label');
    }

    public static function getLabel(): string
    {
        return trans('filament-todo::todo.resource.single');
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-todo.navigation.group') ? trans(config('filament-todo.navigation.group')) : false;
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-todo.navigation.icon') ?? 'heroicon-o-document-text';
    }

    public static function getNavigationLabel(): string
    {
        return trans('filament-todo::todo.navigation.label');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-todo.navigation.sort') ?? 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(trans('filament-todo::todo.resource.title'))
                    ->required(),
                Forms\Components\Textarea::make('body')
                    ->label(trans('filament-todo::todo.resource.body'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('filament-todo::todo.resource.title'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('body')
                    ->label(__('filament-todo::todo.resource.body'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTodos::route('/'),
            'create' => Pages\CreateTodo::route('/create'),
            'edit' => Pages\EditTodo::route('/{record}/edit'),
        ];
    }
}
