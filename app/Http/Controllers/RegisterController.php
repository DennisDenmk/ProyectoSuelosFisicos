<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return 'index';
    }

    public function registerUser()
    {
        try {
            // Datos para crear el usuario
            $data = [
                'tipus_id' => 1, // ID de tipo válido
                'user_cedula' => '1004897456',
                'user_nombre' => 'Juan',
                'user_apellido' => 'Varela',
                'user_email' => 'juon@gmail.com',
                'user_password' => 'admin123', // Contraseña en texto plano (será hasheada)
                'user_telefono' => '0987242851',
                'user_estado' => true,
            ];

            // Crear usuario
            $usuario = User::createUser($data);

            return response()->json([
                'message' => 'Usuario creado con éxito.',
                'usuario' => $usuario,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear el usuario.',
                'error' => $e->getMessage(),
            ], 500);
        }
    
    }

   
    
}
