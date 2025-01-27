<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }
    public function showPerfil()
    {
        return view('Perfil');
    }
    public function showEstudiante()
    {
        return view('cliente.VistaCliente');
    }
    public function showPerfilEstudiante()
    {
        return view('cliente.PerfilEstudiante');
    }


    public function login(Request $request)
    {
        // Validar las credenciales de entrada
        $credentials = $request->validate([
            'user_cedula' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        $user = User::where('user_cedula', $credentials['user_cedula'])->first();

        // Verificar que el usuario existe y la contraseña es correcta
        if ($user && Hash::check($credentials['password'], $user->user_password)) {
            // Autenticar al usuario
            Auth::login($user);

            $tipoUsuario = $user->tipus_id;

            // Redirigir según el tipo de usuario
            if ($tipoUsuario == 4) {
                // Tipo 1: Redirigir a la página de inicio
                return redirect()->intended('/Docente');
            } elseif ($tipoUsuario == 3) {
                // Tipo 2: Redirigir a la página de dashboard
                return redirect()->intended('/Estudiante');
            }
        }

        // Si la autenticación falla, redirigir con error
        return back()->withErrors([
            'user_cedula' => 'Las credenciales no son correctas.',
        ]);
    }

    public function actualizarNombres(Request $request)
    {
        try {
            // Validar los datos de entrada
            $validatedData = $request->validate([
                'user_nombre' => 'required|string|max:50',
                'user_apellido' => 'required|string|max:50',
            ]);


            $user = Auth::user();

            // Actualizar los campos permitidos
            $user->user_nombre = $validatedData['user_nombre'];
            $user->user_apellido = $validatedData['user_apellido'];

            // Guardar los cambios
            $user()->save();

            // Redirigir con un mensaje de éxito
            return back()->with('success', 'Usuario actualizado con éxito.');
        } catch (\Exception $e) {
            // Manejar errores y redirigir con un mensaje de error
            return back()->withErrors([
                'error' => 'Ocurrió un error al actualizar los datos del usuario: ' . $e->getMessage(),
            ]);
        }
    }
    public function cambiarContrasena(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Verificar contraseña actual
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta']);
        }

        // Actualizar contraseña
        $user->password = Hash::make($request->new_password);
        $user()->save();

        return back()->with('success', 'Contraseña actualizada exitosamente');
    }






    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('user_email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('login');
    }
}