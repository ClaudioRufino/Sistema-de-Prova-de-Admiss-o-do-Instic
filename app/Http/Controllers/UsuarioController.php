<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidatos = User::all();
        return response()->json($candidatos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "Clicaste em guardar no Banco de dados";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = json_decode($request->getContent(), true);

        try {
            User::create([
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'password' => Hash::make($dados['password']),
                'telefone' => $dados['telefone'],
                'curso' => $dados['curso'],
                'data_nascimento' => $dados['data_nascimento'],
                'bi' => $dados['bi'],
                'sexo' => $dados['sexo'],
                'nacionalidade' => $dados['nacionalidade'],
                'qualidades' => $dados['qualidades'],
                'exame_id' => 1
            ]);
        } catch (\Exception $e) {
            return response()->json($e);
        }


        return response()->json(['mensagem' => 'Dados enviado com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $candidato = User::find($id);
        return response()->json($candidato);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ExisteValor($campo, $valor)
    {
        $valor = User::where($campo, $valor)->first();

        if ($valor) {
            return response()->json(['existe' => true]);
        } else {
            return response()->json(['existe' => false]);
        }
    }
}
