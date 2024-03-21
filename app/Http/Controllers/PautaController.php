<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Exame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PautaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = DB::table('perguntas as p')
            ->select(DB::raw('distinct c.id, c.nome, sum(p.cotacao) OVER (PARTITION BY c.nome) as total'))
            ->join('user_pergunta as cp', 'cp.pergunta_id', '=', 'p.id')
            ->join('users as c', 'c.id', '=', 'cp.candidato_id')
            ->whereColumn('p.sistema_resposta', '=', 'cp.candidato_resposta')
            ->orderByDesc('p.cotacao')
            ->get();

        
        return view('pauta', ['resultados'=> $resultados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    function pauta_antes(){
        $ano_atual = date('Y');
        $id_exame = Exame::latest()->value('id');
      
        $dados_exame = DB::table('exames as e')
        ->select(DB::raw('e.exame_data, e.exame_hora_inicio,  e.exame_hora_termino'))
        ->where('e.id', '=', $id_exame)
        ->where('e.ano', '=', $ano_atual)
        ->get();

        return view('user.exame.pauta_antes', ['data'=>$dados_exame[0]->exame_data, 'hora_inicial'=> $dados_exame[0]->exame_hora_inicio, 'hora_final'=> $dados_exame[0]->exame_hora_termino]);
    }
}
