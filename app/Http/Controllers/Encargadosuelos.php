<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Detalles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Parcela;
use App\Models\Muestra;

class Encargadosuelos extends Controller
{
    public function create()
    {
        return view('parcelas');
    }

    public function crear(Request $request)
    {
        try {
            $user = Auth::user();

            // Validar los datos de entrada
            $validatedData = $request->validate([
                'cons_id' => 'required|integer',
                'tipos_id' => 'required|string|max:5',
                'parc_nombre' => 'nullable|string|max:50',
                'parc_area' => 'required|numeric',
                'parc_coord_la' => 'required|numeric',
                'parc_coord_lo' => 'required|numeric',
                'parc_descripcion' => 'nullable|string',
            ]);

            // Asignar el user_id del usuario autenticado
            $validatedData['user_id'] = $user->user_id;

            // Crear la parcela
            $parcela = Parcela::create($validatedData);

            // Si se crea correctamente, enviar mensaje de éxito
            return back()->with('success', 'Parcela creada con éxito.');
        } catch (\Exception $e) {
            // En caso de error, enviar mensaje de error
            return back()->withErrors([
                'error' => 'Ocurrió un error al crear la parcela: ' . $e->getMessage(),
            ]);
        }
    }
    public function misParcelas()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar que el usuario esté autenticado
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debe iniciar sesión para ver sus parcelas.');
        }

        // Obtener las parcelas del usuario autenticado
        $parcelas = Parcela::where('user_id', $user->user_id)->get();

        // Retornar la vista con las parcelas
        return view('RegistroSuelo', compact('parcelas'));
    }
    public function crearMuestras(Request $request)
    {
        try {
            // Validar los datos para el detalle
            $validatedDetalle = $request->validate([
                'estru_id' => 'required|string|max:5',
                'poros_id' => 'required|string|max:5',
                'detal_arena' => 'required|numeric',
                'detal_limo' => 'required|numeric',
                'detal_arcilla' => 'required|numeric',
                'detal_pesohumedo' => 'required|numeric',
                'detal_pesoseco' => 'required|numeric',
                'detal_porosidad' => 'required|numeric',
            ]);

            // Crear el detalle
            $detalle = Detalles::create($validatedDetalle);

            // Validar los datos para la muestra
            $validatedMuestra = $request->validate([
                'parc_id' => 'required|numeric', // Validación solo para parc_id
            ]);

            // Crear la muestra relacionada con el detalle
            $muestra = MUESTRA::create([
                'muest_id' => $detalle->detal_id, // Usar DETAL_ID como MUEST_ID
                'parc_id' => $validatedMuestra['parc_id'], // Usar el parc_id recibido del formulario
                'detal_id' => $detalle->detal_id, // Relacionamos con el detalle recién creado
                'muest_fecharegistro' => now(), // Fecha de registro de la muestra
            ]);

            // Si todo fue correcto, devolver mensaje de éxito
            return back()->with('success', 'Muestra Registrada con éxito');
        } catch (\Exception $e) {
            // En caso de error, devolver el mensaje de error
            return back()->withErrors([
                'error' => 'Ocurrió un error: ' . $e->getMessage(),
            ]);
        }
    }
}
