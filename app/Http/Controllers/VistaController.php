<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Muestra;
use App\Models\Parcela;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class VistaController extends Controller
{
    public function showChangePasswordForm($id)
    {
        // Obtener el usuario por ID
        $user = User::findOrFail($id);

        // Mostrar la vista para cambiar la contraseña
        return view('change-password', compact('user'));
    }
    public function verifyUser(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'user_cedula' => 'required|string|max:255',
            'user_nombre' => 'required|string|max:50',
            'user_apellido' => 'required|string|max:50',
            'user_email' => 'required|email|max:50',
        ]);

        // Buscar al usuario en la base de datos
        $user = User::where('user_cedula', $request->user_cedula)
            ->where('user_nombre', $request->user_nombre)
            ->where('user_apellido', $request->user_apellido)
            ->where('user_email', $request->user_email)
            ->first();

        // Verificar si el usuario existe
        if (!$user) {
            return back()->withErrors(['error' => 'Los datos ingresados no coinciden con ningún usuario.']);
        }

        // Si los datos coinciden, redirigir a la página para cambiar la contraseña
        return redirect()->route('password.change', ['id' => $user->user_id]);
    }


    public function updatePassword(Request $request, $id)
    {
        try {
            // Validar la nueva contraseña
            $request->validate([
                'new_password' => 'required|min:8',
                'conf_password' => 'required|min:8'
            ]);

            $user = User::findOrFail($id);
            $user->user_password = hash::make($request['new_password']);
            $user->save();

            // Redirigir al login con un mensaje de éxito
            return back()->with('success', 'Contraseña actualizada con éxito.');
        } catch (\Exception $e) {
            // Redirigir con un mensaje de error
            return back()->with('error', 'Ocurrió un error al actualizar la contraseña: ' . $e->getMessage());
        }
    }



    public function mostrarMuestras()
    {
        // Obtener todas las muestras junto con los detalles relacionados
        $muestras = Muestra::with('detalles')->get();

        // Retornar a la vista y pasar las muestras con los detalles y su textura
        return view('docente.MuestraDocente', compact('muestras'));
    }
    public function mostrarMuestrasEstudiente()
    {
        // Obtener todas las muestras junto con los detalles relacionados
        $muestras = Muestra::with('detalles')->get();

        // Retornar a la vista y pasar las muestras con los detalles y su textura
        return view('cliente.MuestraCliente', compact('muestras'));
    }
    public function mostrarParcelasDocente()
    {
        // Obtener todas las parcelas
        $user = Auth::user();
        $parcelas = Parcela::all();

        // Retornar a la vista con todas las parcelas
        return view('docente.ParcelasDocente', compact('parcelas', 'user'));
    }
}
