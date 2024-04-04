<?php

namespace App\Models;

use Meunik\Edit\HasEdit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Casa extends Model
{
    use HasFactory, HasEdit;

    protected $fillable = ['endereco_id', 'casa_tipo_id'];
    protected $hidden = ['pivot'];
    protected $with = ['endereco'];

    public $relationship = [
        'endereco' => Endereco::class,
        'casa_tipo' => CasaTipo::class
    ];

    // public function valuesEdit()
    // {
    //     return ['teste'];
    //     dd(
    //         'Casa - valuesEdit',
    //         // $this->laravelEdit->table,
    //         $this->laravelEdit->values,
    //         $this->laravelEdit->keysEdit,
    //     );
    // }

    public $appends = ['tipo'];

    public function getTipoAttribute()
    {
        return $this->casaTipo->valor;
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
    public function pessoas()
    {
        return $this->belongsToMany(Pessoa::class);
    }
    public function casaTipo()
    {
        return $this->belongsTo(CasaTipo::class);
    }

    public function toArray()
    {
        $array = parent::toArray();
        unset($array['casa_tipo']);
        return $array;
    }
}
