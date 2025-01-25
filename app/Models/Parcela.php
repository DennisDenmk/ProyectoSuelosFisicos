<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    use HasFactory;

    // Tabla asociada al modelo
    protected $table = 'sm_parcelas';

    // Llave primaria de la tabla
    protected $primaryKey = 'parc_id';

    // Deshabilitar timestamps automáticos si no los estás utilizando
    public $timestamps = false;

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'cons_id',
        'tipos_id',
        'user_id',
        'parc_nombre',
        'parc_area',
        'parc_coord_la',
        'parc_coord_lo',
        'parc_descripcion',
    ];
}