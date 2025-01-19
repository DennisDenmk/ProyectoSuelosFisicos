<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use Notifiable;

    // Tabla asociada al modelo
    protected $table = 'usuarios';

    // Llave primaria personalizada
    protected $primaryKey = 'user_id';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'tipus_id',
        'user_cedula',
        'user_nombre',
        'user_apellido',
        'user_email',
        'user_password',
        'user_telefono',
        'user_estado',
    ];

    // Para manejar las marcas de tiempo personalizadas
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // Método para hashear la contraseña antes de guardar
    public static function createUser($data)
    {
        return self::create([
            'tipus_id' => $data['tipus_id'],
            'user_cedula' => $data['user_cedula'],
            'user_nombre' => $data['user_nombre'],
            'user_apellido' => $data['user_apellido'],
            'user_email' => $data['user_email'],
            'user_password' => Hash::make($data['user_password']), // Hashea la contraseña
            'user_telefono' => $data['user_telefono'],
            'user_estado' => $data['user_estado'],
        ]);
    }

}
