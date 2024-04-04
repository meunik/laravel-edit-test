<?php

namespace Database\Seeders;

use App\Models\Casa;
use App\Models\Pessoa;
use App\Models\Veiculo;
use App\Models\CasaTipo;
use App\Models\Endereco;
use App\Models\Telefone;
use App\Models\Relacionamento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=TestesSeeder
     */
    public function run(): void
    {
        Pessoa::factory(10)->create()->each(function ($pessoa) {
            $pessoa->telefones()->saveMany(Telefone::factory(2)->make());
            $pessoa->veiculos()->attach(Veiculo::factory(1)->create());

            $casa_tipo = CasaTipo::all()->random();
            $casa = Casa::factory()->create([
                'endereco_id' => Endereco::factory()->create()->id,
                'casa_tipo_id' => $casa_tipo->id
            ]);
            $pessoa->casas()->attach($casa);

            Relacionamento::factory()->create(['pessoa2_id' => Pessoa::factory()->create()->id, 'pessoa1_id' => $pessoa->id]);
            Relacionamento::factory()->create(['pessoa2_id' => Pessoa::factory()->create()->id, 'pessoa1_id' => $pessoa->id]);
        });
    }
}
