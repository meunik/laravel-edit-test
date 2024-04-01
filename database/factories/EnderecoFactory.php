<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EnderecoFactory extends Factory
{
    protected $model = Endereco::class;

    public function definition(): array
    {
        return [
            'rua' => $this->faker->streetName,
            'cidade' => $this->faker->city,
            'estado' => $this->faker->state,
            'pais' => $this->faker->country,
        ];
    }
}
