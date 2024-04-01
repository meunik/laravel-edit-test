<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\Telefone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TelefoneFactory extends Factory
{
    protected $model = Telefone::class;

    public function definition(): array
    {
        return [
            'pessoa_id' => Pessoa::factory(),
            'numero' => $this->faker->phoneNumber,
        ];
    }
}
