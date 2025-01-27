<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Muestra; 
use App\Models\Parcela;
use App\Models\Detalles;
use Illuminate\Http\Request;

class VistaController extends Controller
{
    public function mostrarMuestras()
    {
        // Obtener todas las muestras junto con los detalles relacionados
        $muestras = Muestra::with('detalles')->get();

        // Retornar a la vista y pasar las muestras con los detalles y su textura
        return view('Registros', compact('muestras'));
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
        // Obtener todas las muestras junto con los detalles relacionados
        $parcelas = Parcela::all();
        // Retornar a la vista y pasar las muestras con los detalles y su textura
        return view('docente.ParcelasDocente', compact('parcelas'));
    }
    

}
