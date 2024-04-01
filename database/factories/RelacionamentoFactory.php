<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\Relacionamento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RelacionamentoFactory extends Factory
{
    protected $model = Relacionamento::class;

    public function definition(): array
    {
        return [
            'pessoa1_id' => Pessoa::factory(),
            'pessoa2_id' => Pessoa::factory(),
            'tipo' => $this->faker->randomElement(['conjuge', 'pais', 'filhos']),
        ];
    }
}
