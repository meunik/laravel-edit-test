<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Crie para mim migrations laravel para as seguintes tabela `pessoas`, `relacionamento`, `telefone`, `endereco`, `casa`, `veiculo`. Onde `pessoas` podem ter mais de 1 `telefone`, `pessoas` podem ter mais de 1 `veiculo`, `pessoas` podem ter mais de 1 `casa`, `pessoas` podem ter mais de 1 `pessoas` atravéz de `relacionamento`, esse relacionamento pode ser conjuge, pais ou filhos. `casa` pode ter 1 único `endereco`, `casa` pode pertencer a mais de 1 `pessoas` e `veiculo` pode pertencer a mais de 1 `pessoas`.
     */
    public function up(): void
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('telefones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa_id');
            $table->string('numero');
            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
        });

        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->timestamps();
        });

        Schema::create('pessoa_veiculo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa_id');
            $table->unsignedBigInteger('veiculo_id');
            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
        });

        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('rua');
            $table->string('cidade');
            $table->string('estado');
            $table->string('pais');
            $table->timestamps();
        });

        Schema::create('casa_tipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('valor');
        });

        Schema::create('casas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('endereco_id');
            $table->unsignedBigInteger('casa_tipo_id');
            $table->timestamps();

            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('cascade');
            $table->foreign('casa_tipo_id')->references('id')->on('casa_tipos');
        });

        DB::table('casa_tipos')->insert([
            ['valor' => 'Casa'],
            ['valor' => 'Apartamento'],
            ['valor' => 'kitnet']
        ]);

        Schema::create('casa_pessoa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa_id');
            $table->unsignedBigInteger('casa_id');
            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('casa_id')->references('id')->on('casas')->onDelete('cascade');
        });

        Schema::create('relacionamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa1_id');
            $table->unsignedBigInteger('pessoa2_id');
            $table->string('tipo')->nullable(); // conjuge, pais, filhos
            $table->timestamps();

            $table->foreign('pessoa1_id')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('pessoa2_id')->references('id')->on('pessoas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
        Schema::dropIfExists('telefones');
        Schema::dropIfExists('veiculos');
        Schema::dropIfExists('pessoa_veiculo');
        Schema::dropIfExists('enderecos');
        Schema::dropIfExists('casas');
        Schema::dropIfExists('casa_tipos');
        Schema::dropIfExists('casa_pessoa');
        Schema::dropIfExists('relacionamentos');
    }
};
