<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sauce>
 */
class SauceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userId' => $this->faker->uuid,
            'name' => $this->faker->word,
            'manufacturer' => $this->faker->company,
            'description' => $this->faker->sentence,
            'mainPepper' => $this->faker->word,
            'imageUrl' => $this->faker->imageUrl(),
            'heat' => $this->faker->numberBetween(1, 10),
            'likes' => $this->faker->numberBetween(0, 100),
            'dislikes' => $this->faker->numberBetween(0, 100),
            'usersLiked' => json_encode($this->faker->randomElements(['user1', 'user2', 'user3'], $this->faker->numberBetween(0, 3))),
            'usersDisliked' => json_encode($this->faker->randomElements(['user4', 'user5', 'user6'], $this->faker->numberBetween(0, 3))),
        ];
    }
}
