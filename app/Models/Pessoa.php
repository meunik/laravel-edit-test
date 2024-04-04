<?php

namespace App\Models;

use App\Models\Edition;
use Meunik\Edit\HasEdit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pessoa extends Model
{
    use HasFactory, HasEdit;

    protected $fillable = ['nome'];
    protected $hidden = ['pivot'];
    protected $with = ['relacionamentos', 'telefones', 'veiculos', 'casas'];

    public $editModel = Edition::class;
    public $relationship = [
        'relacionamentos' => [Pessoa::class],
        'telefones' => [Telefone::class],
        'veiculos' => [Veiculo::class],
        'casas' => [Casa::class],
    ];

    public function before()
    {
        // $this->laravelEdit->addOnBefore = 'Casa - addOnBefore';
        // return $this;
    }

    protected $appends = ['tipo'];

    public function getTipoAttribute()
    {
        if ($this->pivot) return $this->pivot->tipo;
    }

    public function telefones(): HasMany
    {
        return $this->hasMany(Telefone::class);
    }
    public function veiculos(): BelongsToMany
    {
        return $this->belongsToMany(Veiculo::class);
    }
    public function casas(): BelongsToMany
    {
        return $this->belongsToMany(Casa::class);
    }
    public function relacionamentos(): BelongsToMany
    {
        return $this->belongsToMany(Pessoa::class, 'relacionamentos', 'pessoa1_id', 'pessoa2_id')->withPivot('tipo');
    }
}
