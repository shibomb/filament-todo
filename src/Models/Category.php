<?php

namespace Shibomb\FilamentTodo\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'todo_categories';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'color',
        'sort_order',
    ];

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class, 'todo_category_id', 'id');
    }
}
