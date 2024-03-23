<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voo extends Model
{
    use HasFactory;
    protected $fillable = ['aeroporto_origem_id', 'aeroporto_destino_id', 'partida_datetime'];

    public function classes()
    {
        return $this->hasMany(VooClasse::class);
    }
}
