<?php

namespace Database\Factories;

use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VeiculoFactory extends Factory
{
    protected $model = Veiculo::class;

    public function definition(): array
    {
        return [
            'modelo' => $this->faker->randomElement(['Carro', 'Moto', 'Caminhão']),
        ];
    }
}
