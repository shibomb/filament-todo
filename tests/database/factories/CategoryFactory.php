<?php

namespace Shibomb\FilamentTodo\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Shibomb\FilamentTodo\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->unique()->words(3, true),
            'color' => '#ff0000',
            'sort_order' => $this->faker->numberBetween(0, 999999),
            'created_at' => $this->faker->dateTimeBetween('-1 year', '-6 month'),
            'updated_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
        ];
    }
}
