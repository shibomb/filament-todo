<?php

namespace Shibomb\FilamentTodo\Resources;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Shibomb\FilamentMultiComponentsColumn\Components\MultiComponentsColumn;

use function now;

use Shibomb\FilamentTodo\Models\Todo;
use Shibomb\FilamentTodo\Resources\TodoResource\Pages;

class TodoResource extends Resource
{
    protected static ?string $model = Todo::class;

    protected static ?string $slug = 'todo/todos';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'Todo';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__('filament-todo::filament-todo.title'))
                            ->required(),

                        Forms\Components\Select::make('todo_category_id')
                            ->label(__('filament-todo::filament-todo.category'))
                            ->relationship('category', 'name', fn (Builder $query) => $query->orderBy('sort_order'))
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                            ]),

                        Forms\Components\RichEditor::class::make('content')
                            ->label(__('filament-todo::filament-todo.content'))
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'undo',
                            ])
                            ->fileAttachmentsDirectory('todo-attachments')
                            ->columnSpan([
                                'sm' => 2,
                            ]),

                        Forms\Components\DatePicker::make('published_at')
                            ->label(__('filament-todo::filament-todo.published_at'))
                            ->displayFormat('Y-m-d')
                            ->columnSpan([
                                'sm' => 2,
                            ]),

                        Forms\Components\Toggle::make('is_finished')
                            ->label(__('filament-todo::filament-todo.is_finished'))
                    ])
                    ->columns([
                        'sm' => 1,
                    ])
                    ->columnSpan(2),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label(__('filament-todo::filament-todo.created_at'))
                            ->content(fn (
                                ?Todo $record
                            ): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label(__('filament-todo::filament-todo.last_modified_at'))
                            ->content(fn (
                                ?Todo $record
                            ): string => $record ? $record->updated_at->diffForHumans() : '-'),
                    ])
                    ->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('is_finished')
                    ->label(__('filament-todo::filament-todo.is_finished')),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('filament-todo::filament-todo.title'))
                    ->searchable()
                    ->sortable(),
                MultiComponentsColumn::make('category.name')
                    ->label(__('filament-todo::filament-todo.category_name'))
                    ->searchable()
                    ->sortable()
                    ->components([
                        Tables\Columns\ColorColumn::make('category.color'),
                        Tables\Columns\TextColumn::make('category.name')
                    ]),
                Tables\Columns\TextColumn::make('published_at')
                    ->label(__('filament-todo::filament-todo.published_at'))
                    ->dateTime('Y-m-d')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('unfinished_only')
                    ->label(__('filament-todo::filament-todo.unfinished_only'))
                    ->query(fn (Builder $query): Builder => $query->where('is_finished', false))
                    ->default(true),
                Tables\Filters\Filter::make('published')
                    ->form([
                        Forms\Components\DatePicker::make('published_until')
                            ->label(__('filament-todo::filament-todo.published_until'))
                            ->displayFormat('Y-m-d')
                            ->default(now()),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    }),
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

    protected static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['category']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'content', 'category.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->category) {
            $details['Category'] = $record->category->name;
        }

        return $details;
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-todo::filament-todo.todos');
    }

    public static function getModelLabel(): string
    {
        return __('filament-todo::filament-todo.todo');
    }
}
