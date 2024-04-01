<?php

namespace Database\Factories;

use App\Models\Casa;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CasaFactory extends Factory
{
    protected $model = Casa::class;

    public function definition(): array
    {
        return [
            'endereco_id' => Endereco::factory(),
        ];
    }
}
