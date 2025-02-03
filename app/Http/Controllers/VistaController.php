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
        // Validar solo cédula y correo
        $request->validate([
            'user_cedula' => 'required|string|max:255',
            'user_email'  => 'required|email|max:50',
        ]);

        // Buscar al usuario en la base de datos utilizando la cédula y el correo
        $user = User::where('user_cedula', $request->user_cedula)
                    ->where('user_email', $request->user_email)
                    ->first();

        // Si no se encuentra el usuario, se regresa con un error
        if (!$user) {
            return back()->withErrors(['error' => 'Los datos ingresados no coinciden con ningún usuario.']);
        }

        // Si se encuentra el usuario, redirigir al formulario para cambiar la contraseña
        return redirect()->route('password.change', ['id' => $user->user_id]);
    }



    public function updatePassword(Request $request, $id)
    {
        // Validar que las contraseñas coincidan y tengan al menos 8 caracteres
        $request->validate([
            'new_password' => 'required|min:8|same:conf_password',
            'conf_password' => 'required|min:8'
        ], [
            'new_password.same' => 'Las contraseñas no coinciden.',
            'new_password.min' => 'La contraseña debe tener al menos 8 caracteres.'
        ]);

        try {
            // Buscar al usuario en la base de datos
            $user = User::findOrFail(17);     
            // Encriptar la nueva contraseña
            $user->user_password = Hash::make($request->new_password);

            // Guardar cambios en la base de datos
            $user->save();

            // Redirigir con mensaje de éxito
            return back()->with('success', 'Contraseña actualizada con éxito.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error al actualizar la contraseña: ' . $e->getMessage()]);
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
