<?php

namespace Shibomb\FilamentTodo\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Shibomb\FilamentTodo\Models\Todo;

class TodoFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Todo::class;

    public function definition(): array
    {
        return [
            'title' => $title = $this->faker->unique()->sentence(4),
            'todo_category_id' => $this->faker->numberBetween(0, 9),
            'content' => $this->faker->realText(),
            'published_at' => $this->faker->dateTimeBetween('-6 month', '+1 month'),
            'is_finished' => $this->faker->numberBetween(0, 1),
            'created_at' => $this->faker->dateTimeBetween('-1 year', '-6 month'),
            'updated_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
        ];
    }
}
