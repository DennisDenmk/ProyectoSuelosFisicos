<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function registerUser()
    {
        try {
            // Datos para crear el usuario
            //Usuario 3 Estudiante
            //Usuario 4 Docente
            $data = [
                'tipus_id' => 4, // ID de tipo válido
                'user_cedula' => '1004964217',
                'user_nombre' => 'David',
                'user_apellido' => 'Ramos',
                'user_email' => 'david@gmail.com',
                'user_password' => Hash::make('admin123'),
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
    public function registerUsuario(Request $request)
    {
        try {

            // Validar los datos de entrada
            $request->validate([
                'tipus_id' => 'required|integer',
                'user_cedula' => 'required|string|unique:usuarios,user_cedula',
                'user_nombre' => 'required|string|max:255',
                'user_apellido' => 'required|string|max:255',
                'user_email' => 'required|email|unique:usuarios,user_email',
                'user_password' => 'required|string|min:8|confirmed',
                'user_telefono' => 'required|string|max:15|unique:usuarios,user_telefono',
            ]);
            // Preparar los datos para crear el usuario
            $data = [
                'tipus_id' => $request->tipus_id,
                'user_cedula' => $request->user_cedula,
                'user_nombre' => $request->user_nombre,
                'user_apellido' => $request->user_apellido,
                'user_email' => $request->user_email,
                'user_password' => Hash::make($request->user_password), // Encriptar la contraseña
                'user_telefono' => $request->user_telefono,
                'user_estado' => true,
            ];

            // Crear el usuario
            $usuario = User::create($data);

            // Retornar respuesta de éxito
            return back()->with('success', 'Usuario creado con éxito.');
        } catch (\Exception $e) {
            // Registrar el error para depuración
            Log::error('Error al crear usuario: ' . $e->getMessage());

            // Retornar respuesta de error al usuario
            return back()->with('error', 'Error al crear el usuario: ' . $e->getMessage());
        }
    }
}
