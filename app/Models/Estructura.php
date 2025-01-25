<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estructura extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla si no sigue la convención
    protected $table = 'sm_f_estructuras';

    // Definir la clave primaria (por defecto Laravel asume 'id', pero la tuya es 'ESTRU_ID')
    protected $primaryKey = 'estru_id';

    // Indicar si la clave primaria es auto-incremental, en caso de no serlo
    public $incrementing = false;

    // Definir los campos que son asignables masivamente (a través de 'create' o 'update')
    protected $fillable = [
        'estru_id',
        'estru_descripcion',
    ];

    // Si usas timestamps, puedes mantenerlo en true, si no, lo deshabilitas
    public $timestamps = false; // Ya que no mencionaste campos de tiempo
}
