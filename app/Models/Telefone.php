<?php

namespace App\Models;

use Meunik\Edit\HasEdit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Telefone extends Model
{
    use HasFactory, HasEdit;

    protected $fillable = ['numero', 'pessoa_id'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}
