<?php

namespace App\Http\Controllers;

use App\Models\Voo;
use Illuminate\Http\Request;

class VooController extends Controller
{
    //
    public function listaVoo()
    {
        $voos = Voo::all();

        return response()->json($voos);
    }

    public function cadastraVoo(Request $request)
    {
        $voo = new Voo();
        $voo->numero_voo = $this->geraNumeroVoo();
        $voo->aeroporto_origem_id = $request->get('origem');
        $voo->aeroporto_destino_id = $request->get('destino');
        $voo->partida_datetime = $request->get('data');

    }
    
    public function geraNumeroVoo(){
        $numeroVoo = rand(1000, 9999);
        $voo = Voo::where('numero_voo', $numeroVoo)->exists();
        
    }
}
