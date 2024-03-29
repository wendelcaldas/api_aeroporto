<?php

namespace App\Http\Controllers;

use App\Models\Aeroporto;
use Illuminate\Http\Request;

class AeroportoController extends Controller
{
    public function buscaAeroporto($id = null)
    {
        if($id !== null){

            $aeroporto = Aeroporto::find($id);

            return response()->json($aeroporto);
        }
        $aeroportos = Aeroporto::all();

        return response()->json($aeroportos);
    }
}
