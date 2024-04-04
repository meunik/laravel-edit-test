<?php

namespace App\Models;

use Meunik\Edit\HasEdit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Veiculo extends Model
{
    use HasFactory, HasEdit;

    protected $fillable = ['modelo'];
    protected $hidden = ['pivot'];

    public function pessoas()
    {
        return $this->belongsToMany(Pessoa::class);
    }
}
