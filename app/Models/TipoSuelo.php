<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSuelo extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'sm_f_tipossuelos';

    // Llave primaria personalizada
    public $primaryKey = 'tipos_id';
    public $keyType = 'string';

    // Definir si la tabla tiene marcas de tiempo
    public $timestamps = false;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'tipos_id',
        'tipos_nombre',
        'tipos_descripcion'
    ];
    
    public function parcelas()
    {
        return $this->hasMany(Parcela::class, 'tipos_id', 'tipos_id');
    }
}
