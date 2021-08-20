<?php

namespace Database\Factories;

use App\Models\Idea;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->sentence(3),
            'user_id' => User::factory()->create(),
            'idea_id' => Idea::factory()->create(),
        ];
    }
}
