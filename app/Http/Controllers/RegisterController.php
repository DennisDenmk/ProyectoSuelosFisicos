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
            //Usuario 3 Estudiante
            //Usuario 4 Docente
            $data = [
                'tipus_id' => 4, // ID de tipo válido
                'user_cedula' => '1000000000',
                'user_nombre' => 'Dennis',
                'user_apellido' => 'Mejia',
                'user_email' => 'memo@gmail.com',
                'user_password' => bcrypt('admin123'),
                'user_telefono' => '0977242576',
                'user_estado' => true,
            ];

            // Crear usuario
            $usuario = User::create($data); // Cambié `User::createUser` por `User::create`, que es el método estándarta);

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
