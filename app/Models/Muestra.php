<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    use HasFactory;

    protected $table = 'sm_f_muestras';
    protected $primaryKey = 'muest_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'muest_id',
        'parc_id',
        'detal_id',
        'muest_fecharegistro',
    ];
    public function detalle()
    {
        return $this->belongsTo(Detalles::class, 'detal_id', 'detal_id');
    }

    public function parcela()
    {
        return $this->belongsTo(Parcela::class, 'parc_id', 'parc_id');
    }
}
