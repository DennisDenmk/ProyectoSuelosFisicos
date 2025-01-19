<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProfileController extends Controller
{
    public function show(){
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // Validar las credenciales de entrada
        $credentials = $request->validate([
            'user_email' => 'required',
            'password' => 'required|string',
        ]);
       
        // Intentar autenticar con 'user_email' y 'password'
        if (Auth::attempt(['user_email' => $credentials['user_email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard'); // Redirige al dashboard o ruta protegida
        }

        // Si falla, devolver con un mensaje de error
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
