<?php

namespace Database\Factories;

use App\Models\Idea;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Idea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ucwords($this->faker->sentence()),
            'user_id' => User::factory()->create(),
            'category_id' => rand(1, 4),
            'status_id' => rand(1, 3),
            'desc' => $this->faker->paragraph(4),
        ];
    }
}
