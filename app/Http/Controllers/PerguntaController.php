<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perguntas = Pergunta::all();
        
        $perguntas_matematica = $perguntas->where('disciplina', 'Matematica');
        $perguntas_fisica = $perguntas->where('disciplina', 'Fisica');

        return view("admin.pergunta.listar", ['perguntas_de_matematica'=>$perguntas_matematica, 'perguntas_de_fisica'=>$perguntas_fisica]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view("admin.pergunta.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pergunta $pergunta)
    {
        $perguntas = Pergunta::all();
        return view("admin.pergunta.editar", ['perguntas' => $perguntas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $perguntas = [
            $request->pergunta_1, $request->pergunta_2, $request->pergunta_3, $request->pergunta_4,
            $request->pergunta_5, $request->pergunta_6, $request->pergunta_7, $request->pergunta_8,
            $request->pergunta_9, $request->pergunta_10, $request->pergunta_11, $request->pergunta_12,
            $request->pergunta_13, $request->pergunta_14, $request->pergunta_15, $request->pergunta_16,
            $request->pergunta_17, $request->pergunta_18, $request->pergunta_19, $request->pergunta_20
          ];
        
          $respostas = [
            $request->resposta_1, $request->resposta_2, $request->resposta_3, $request->resposta_4,
            $request->resposta_5, $request->resposta_6, $request->resposta_7, $request->resposta_8,
            $request->resposta_9, $request->resposta_10, $request->resposta_11, $request->resposta_12,
            $request->resposta_13, $request->resposta_14, $request->resposta_15, $request->resposta_16,
            $request->resposta_17, $request->resposta_18, $request->resposta_19, $request->resposta_20
          ];

        //   return $perguntas[0];

        for($i = 0; $i < 20; $i++){
            if($i < 10){
                $disciplina = "Matematica"; 
            }
            else{
                $disciplina = "Fisica"; 
            }

            $pergunta = Pergunta::find(($i+1));
            if(isset($perguntas[$i]) && isset($respostas[$i])){
                $pergunta->questao = $perguntas[$i];
                $pergunta->cotacao = 1;
                $pergunta->disciplina = $disciplina;
                $pergunta->sistema_resposta = $respostas[$i];
            }
            else if(!isset($perguntas[$i])){
                if(isset($respostas[$i])){
                    $pergunta->questao = "p";
                    $pergunta->sistema_resposta = $respostas[$i];
                }else{
                    $pergunta->questao = "p";
                    $pergunta->sistema_resposta = -111;
                }
                    $pergunta->cotacao = 111;
                    $pergunta->disciplina = $disciplina;
            }
            else if(!isset($respostas[$i])){
                if(isset($perguntas[$i])){
                    $pergunta->questao = $perguntas[$i];
                    $pergunta->sistema_resposta = -111;
                }else{
                    $pergunta->questao = "p";
                    $pergunta->sistema_resposta = -111;
                }
                $pergunta->cotacao = 1;
                $pergunta->disciplina = $disciplina;
            }
            $pergunta->save();
            
        }
        return redirect()->route('perguntas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
