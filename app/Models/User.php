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

    
    // Método para obtener el nombre del campo para la autenticación
    public function getAuthIdentifierName()
    {
        return 'user_email';  // Cambia 'email' por 'user_email'
    }
    
    public function getAuthPassword()
    {
        return $this->user_password;
    }
    
    public function parcelas()
    {
        return $this->hasMany(Parcela::class, 'user_id', 'user_id');
    }
   

}
