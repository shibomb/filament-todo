<?php

namespace Shibomb\FilamentTodo\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Shibomb\FilamentTodo\Enums\IsFinished;
use Shibomb\FilamentTodo\Models\Todo;
use Shibomb\FilamentTodo\Resources\TodoResource\Pages;

class TodoResource extends Resource
{
    protected static ?string $model = Todo::class;

    public static function getPluralLabel(): string
    {
        return trans('filament-todo::filament-todo.resource.todo.label');
    }

    public static function getLabel(): string
    {
        return trans('filament-todo::filament-todo.resource.todo.single');
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-todo.navigation.todo.group') ? trans(config('filament-todo.navigation.todo.group')) : false;
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-todo.navigation.todo.icon') ?? 'heroicon-o-document-check';
    }

    public static function getNavigationLabel(): string
    {
        return trans('filament-todo::filament-todo.navigation.todo.label');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-todo.navigation.todo.sort') ?? 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('filament_todo_category_id')
                    ->label(trans('filament-todo::filament-todo.resource.category.single'))
                    ->relationship(name: 'category', titleAttribute: 'name'),
                Forms\Components\TextInput::make('title')
                    ->label(trans('filament-todo::filament-todo.resource.todo.title'))
                    ->required(),
                Forms\Components\RichEditor::make('content')
                    ->label(trans('filament-todo::filament-todo.resource.todo.content'))
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label(trans('filament-todo::filament-todo.resource.todo.image'))
                    ->disk('public') // 'local', 'public', 's3'
                    ->directory('filament-todo-images') //'private/filament-todo-images')
                    ->visibility('public')
                    ->image()
                    ->imagePreviewHeight('250')
                    // ->imageResizeMode('cover')
                    // ->imageCropAspectRatio('16:9')
                    // ->imageResizeTargetWidth('1920')
                    // ->imageResizeTargetHeight('1080')
                    ->imageEditor()
                    // ->imageEditorMode(1)
                    // ->imageEditorViewportWidth('1920')
                    // ->imageEditorViewportHeight('1080')
                    ->imageEditorAspectRatios([
                        null,
                        '1:1',
                        '4:3',
                        '16:9',
                    ])
                ,
                Forms\Components\DatePicker::make('published_at')
                    ->label(trans('filament-todo::filament-todo.resource.todo.published_at'))
                    ->format('Y/m/d'),
                Forms\Components\Toggle::make('is_finished')
                    ->label(trans('filament-todo::filament-todo.resource.todo.is_finished')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label(trans('filament-todo::filament-todo.resource.category.label'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label(trans('filament-todo::filament-todo.resource.todo.title'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('content')
                    ->label(trans('filament-todo::filament-todo.resource.todo.content'))
                    ->html()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label(trans('filament-todo::filament-todo.resource.todo.image')),
                Tables\Columns\TextColumn::make('published_at')
                    ->label(trans('filament-todo::filament-todo.resource.todo.published_at'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_finished')
                    ->label(trans('filament-todo::filament-todo.resource.todo.is_finished'))
                    ->badge()
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('unfinished_only')
                    ->label(__('filament-todo::filament-todo.resource.todo.unfinished_only'))
                    ->query(fn(Builder $query): Builder => $query->where('is_finished', false))
                    ->default(true),
                Tables\Filters\Filter::make('published')
                    ->form([
                        Forms\Components\DatePicker::make('published_until')
                            ->label(__('filament-todo::filament-todo.resource.todo.published_until'))
                            ->displayFormat('Y-m-d')
                            ->default(now()),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    }),

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
