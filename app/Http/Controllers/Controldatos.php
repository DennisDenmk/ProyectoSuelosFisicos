<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parcela;

class Controldatos extends Controller
{

    
    public function index()
    {
        

        return view('home');
    }
    
    public function select(Request $request)
    {
        $request->validate([
            'parcela_id' => 'required|exists:sm_q_parcelas,parc_id',
        ]);

        $parcela = Parcela::find($request->parcela_id);

        // Realizar alguna acción con la parcela seleccionada
        return redirect()->back()->with('success', 'Has seleccionado la parcela: ' . ($parcela->parc_nombre ?? 'Sin nombre'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'cons_id' => 'required|integer',
            'tipos_id' => 'required|string|max:5',
            'parc_nombre' => 'nullable|string|max:50',
            'parc_area' => 'required|numeric',
            'parc_coord_la' => 'required|numeric',
            'parc_coord_lo' => 'required|numeric',
            'parc_descripcion' => 'nullable|string',
        ]);


        

        return redirect()->route('home')->with('success', 'Parcela agregada exitosamente.');
    }

}
