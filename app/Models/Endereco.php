<?php

namespace App\Models;

use App\Server\Edita\HasEdit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Endereco extends Model
{
    use HasFactory, HasEdit;

    protected $fillable = ['rua', 'cidade', 'estado', 'pais'];

    public function casa()
    {
        return $this->hasOne(Casa::class);
    }
}
