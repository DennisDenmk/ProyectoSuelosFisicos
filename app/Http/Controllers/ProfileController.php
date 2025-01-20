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
    public function login(Request $request)
{
    // Validar las credenciales de entrada
    $credentials = $request->validate([
        'user_email' => 'required|string|email|max:255',
        'password' => 'required|string',
    ]);

    // Intentar autenticar al usuario
    $user = User::where('user_email', $credentials['user_email'])->first();

    // Verificar que el usuario existe y la contraseña es correcta
    if ($user && Hash::check($credentials['password'], $user->user_password)) {
        // Autenticar al usuario
        Auth::login($user);

        // Obtener el tipo de usuario (TIPUS_ID)
        $tipoUsuario = $user->tipus_id;

        // Redirigir según el tipo de usuario
        if ($tipoUsuario == 1) {
            // Tipo 1: Redirigir a la página de inicio
            return redirect()->intended('/home');
        } elseif ($tipoUsuario == 2) {
            // Tipo 2: Redirigir a la página de dashboard
            return redirect()->intended('/dashboard');
        } else {
            // Para otros tipos de usuario
            return redirect()->intended('/dashboard');
        }
    }

    // Si la autenticación falla, redirigir con error
    return back()->withErrors([
        'user_email' => 'Las credenciales no son correctas.',
    ]);
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
