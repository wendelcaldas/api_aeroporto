<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeroporto extends Model
{
    use HasFactory;
    protected $table = 'aeroportos';

    protected $fillable = ['nome', 'iata', 'id_cidade'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
