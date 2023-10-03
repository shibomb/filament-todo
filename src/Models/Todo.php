<?php

namespace Shibomb\FilamentTodo\Models;

use Filament\Actions\Concerns\HasLabel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Shibomb\FilamentTodo\Enums\IsFinished;

class Todo extends Model
{
    use HasFactory;
    use HasLabel;

    /**
     * @var string
     */
    protected $table = 'filament_todo_todos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'image',
        'published_at',
        'is_finished',
    ];

    public function scopePublished(Builder $query)
    {
        return $query->whereNotNull('published_at');
    }

    public function scopeDraft(Builder $query)
    {
        return $query->whereNull('published_at');
    }

    public function scopeFinished(Builder $query)
    {
        return $query->where('is_finished', 1);
    }

    public function scopeUnfinished(Builder $query)
    {
        return $query->where('is_finished', 0);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'filament_todo_category_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_finished' => IsFinished::class,
    ];
}
