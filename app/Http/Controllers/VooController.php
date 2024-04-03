<?php

namespace App\Http\Controllers;

use App\Models\Voo;
use App\Models\VooClasse;
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
        if($request->get('origem') == $request->get('destino')){
            return response()->json(['Erro' => 'Um voo não pode ter o mesmo aeroporto como origem e destino.']);
        }      

        $voo = new Voo();
        $voo->numero_voo = $this->geraNumeroVoo();
        $voo->aeroporto_origem_id = $request->get('origem');
        $voo->aeroporto_destino_id = $request->get('destino');
        $voo->partida_datetime = $request->get('data');
        $voo->save();
        //Recupera ID do voo cadastrado
        $num = $voo->id;

        $classes = $request->get('classes'); 
        if($classes == null){
            return response()->json(['Mensagem' => 'Vôo cadastrado com 0 classes adicionadas.']);
        }

        $numClasses = 0;
        foreach ($classes as $classe) {
            
            $classeDoVoo = new VooClasse();
            $classeDoVoo->voo_id = $num;
            $classeDoVoo->classe_nome = $classe['nome'];
            $classeDoVoo->assentos = $classe['assentos'];
            $classeDoVoo->valor_assento = $classe['valor_assento'];
            $classeDoVoo->save();

            $numClasses ++;
        };

        return response()->json(['Mensagem' => 'Vôo cadastrado com '. $numClasses .' classes adicionadas.']);
    }
    
    public function geraNumeroVoo(){

        do {
            $voo = rand(10000, 99999);

            $existente = Voo::where('numero_voo', $voo)->exists();
        } while ($existente);

        return $voo;
    }

    public function geraToken()
    {
        return csrf_token(); 
    }
}
