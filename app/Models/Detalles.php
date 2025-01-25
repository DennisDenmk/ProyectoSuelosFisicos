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

    public function obtenerTextura()
    {
        $arena = $this->detal_arena;
        $limo = $this->detal_limo;
        $arcilla = $this->detal_arcilla;

        if ($arcilla >= 40 && $limo >= 40) {
            return 'Arcillosa limosa';
        } elseif ($arcilla >= 40 && $arena >= 45) {
            return 'Arcillosa arenosa';
        } elseif ($arcilla >= 27 && $arcilla <= 40 && $limo >= 28 && $limo <= 50 && $arena <= 45) {
            return 'Franca arcillosa';
        } elseif ($arcilla >= 20 && $arcilla <= 27 && $limo >= 27 && $limo <= 40 && $arena <= 52) {
            return 'Franca limosa arcillosa';
        } elseif ($limo >= 50 && $arcilla < 27 && $arena <= 50) {
            return 'Franca limosa';
        } elseif ($limo >= 28 && $limo < 50 && $arcilla < 20 && $arena <= 52) {
            return 'Franca limosa arenosa';
        } elseif ($arena >= 70 && $arcilla < 15 && $limo < 30) {
            return 'Arenosa';
        } elseif ($arena >= 52 && $arcilla >= 15 && $arcilla < 27) {
            return 'Franca arenosa';
        } else {
            return 'Franca';
        }
    }
    public function detalles()
    {
        return $this->belongsTo(Detalles::class, 'detal_id');
    }
    public function parcela()
    {
        return $this->belongsTo(Parcela::class, 'parc_id');
    }
    // En el modelo Detalles
    public function porosidad()
    {
        return $this->belongsTo(Porosidad::class, 'poros_id', 'poros_id');
    }
    public function estructura()
    {
        return $this->belongsTo(Estructura::class, 'estru_id', 'estru_id');
    }

   
}
