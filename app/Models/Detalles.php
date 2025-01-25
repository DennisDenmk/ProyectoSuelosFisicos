<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    use HasFactory;

    protected $table = 'sm_f_detalles';
    protected $primaryKey = 'detal_id';
    public $timestamps = false; // Desactivar manejo de timestamps

    protected $fillable = [
        'estru_id',
        'poros_id',
        'detal_arena',
        'detal_limo',
        'detal_arcilla',
        'detal_pesohumedo',
        'detal_pesoseco',
        'detal_porosidad',
    ];
}

