<?php

namespace App\Models;

use Meunik\Edit\HasEdit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CasaTipo extends Model
{
    use HasFactory, HasEdit;

    protected $table = 'casa_tipos';
    protected $fillable = ['valor'];

    public function casas()
    {
        return $this->hasMany(Casa::class);
    }
}
