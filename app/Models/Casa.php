<?php

namespace App\Models;

use App\Server\Edita\HasEdit;
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

    // public function before()
    // {
    //     $this->laravelEdit->values['tipo'] = 'teste';
    //     return $this->laravelEdit->values;
    // }

    // public function after()
    // {
    //     dd(
    //         'Casa - after',
    //         $this->laravelEdit->values,
    //         $this->laravelEdit->before,
    //     );
    // }

    // public function exception()
    // {
    //     // dd($this->laravelEdit);
    //     dd(
    //         'Casa - exception',
    //         // $this->laravelEdit->table,
    //         $this->laravelEdit->values,
    //         $this->laravelEdit->attribute,
    //         $this->laravelEdit->create,
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
