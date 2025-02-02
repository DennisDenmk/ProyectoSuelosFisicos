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
    protected $keyType = 'int';

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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function tipoSuelo()
    {
        return $this->belongsTo(tipoSuelo::class, 'tipos_id', 'tipos_id');
    }
    public function muestras()
    {
        return $this->hasMany(Muestra::class, 'parc_id', 'parc_id');
    }
}
