<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porosidad extends Model
{
    use HasFactory;

    // Define la tabla asociada al modelo
    protected $table = 'sm_f_porosidades';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = ['poros_id', 'poros_descripcion'];

    // Definir la clave primaria
    protected $primaryKey = 'poros_id';

    // Establecer que la clave primaria no es un número autoincremental
    public $incrementing = false;

    // Si no utilizas los timestamps
    public $timestamps = false;
}
