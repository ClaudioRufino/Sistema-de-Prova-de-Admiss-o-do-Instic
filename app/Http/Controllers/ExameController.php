<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "Clicou para Exame Index";
        $exames = Exame::all();
        return view('admin.exame.listar', ['exames'=>$exames]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exame.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Exame::create([
            'ano' => $request->ano,
            'vagas'=>$request->vaga,
            'exame_data'=>$request->data,
            'preco' => $request->preco,
            'exame_hora_inicio'=>$request->hora_inicio,
            'exame_hora_termino'=>$request->hora_termino
        ]);

        redirect()->route('exame.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Exame $exame)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exame $exame)
    {
        //
        $ano_atual = date('Y');
        $dados_exame = Exame::where('ano', $ano_atual)->get();

        // return $dados_exame;

        return view('admin.exame.editar', compact('dados_exame'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exame $exame)
    {
        //
        $ano_atual = date('Y');
        $dados_exame = Exame::where('ano', $ano_atual)->get();
        $id = $dados_exame[0]->id;

        $dados_exame = Exame::find($id);

        $dados_exame->ano = $request->ano;
        $dados_exame->vagas = $request->vaga;
        $dados_exame->preco = $request->preco;
        $dados_exame->exame_data = $request->data;
        $dados_exame->exame_hora_inicio = $request->hora_inicio;
        $dados_exame->exame_hora_termino = $request->hora_termino;
        $dados_exame->save();

        return redirect()->route('exame.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exame $exame)
    {
        //
    }

}
