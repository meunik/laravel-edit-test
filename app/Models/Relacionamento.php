<?php

namespace App\Models;

use Meunik\Edit\HasEdit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Relacionamento extends Model
{
    use HasFactory, HasEdit;

    protected $fillable = ['pessoa1_id', 'pessoa2_id', 'tipo'];

    public function pessoa1()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa1_id');
    }
    public function pessoa2()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa2_id');
    }
}
