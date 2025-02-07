<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition(): array
    {
        return [
            'NumeroClient' => $this->faker->randomNumber(),
            'Nom' => $this->faker->name(),
            'Email' => $this->faker->unique()->safeEmail(),
            'carteBancaire' => $this->faker->creditCardNumber(),
        ];
    }
}
