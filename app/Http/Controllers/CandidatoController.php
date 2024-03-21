<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Exame;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\Object_;

class CandidatoController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $total_candidatos = User::count();
        $candidatos_informatica = User::where('curso', 'Informatica')->count();
        $candidatos_telecomunicacao = User::where('curso', 'Telecomunicacao')->count();

        
    /* Usuários cadastrados Hoje */
        $dia_atual = date('Y-m-d');
        $usuarios_cadastrados = User::whereDate('created_at', '=', $dia_atual)->count();


        $candidatos = (Object)[
            'total'=> $total_candidatos,
            'informaticos' => $candidatos_informatica,
            'telecom' => $candidatos_telecomunicacao,
            'cadastrados_hoje'=>$usuarios_cadastrados
        ];
       
        $usuario_id = Auth::id();
        $usuario_nome = User::find($usuario_id)->nome;

        if($usuario_id == 1){
            return view('admin.index', ['candidatos' => $candidatos, 'nome'=> $usuario_nome, 'usuario_id'=>$usuario_id]);
        }
        else{
            return view('user.candidato.index', ['candidatos' => $candidatos, 'nome'=> $usuario_nome, 'usuario_id'=>$usuario_id]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Chama a view cadastrar
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Armazena no banco de dados
        
        $ano_atual = date('Y');
        $id = Exame::all();
        $id_exame = $id->where('ano', $ano_atual); 

        $sexo = $request->input('name','sexo');

        User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'curso' => $request->curso,
            'data_nascimento'=> $request->data_nascimento,
            'bi' => $request->bi,
            'sexo' => $sexo,
            'nacionalidade'=> $request->nacionalidade, 
            'qualidades' => $request->qualidades,
            'senha' =>Hash::make($request->senha),
            'exame_id'=>$id_exame[0]->id
        ]);

        return view('cadastro_sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $candidato)
    {
        // Mostra um candidato especifico atraves do id
        $teste = $candidato->exame->ano;
        return "Eu sou o método SHOW";

        // return view('teste', ['Candidato' => $Candidato, 'Exame_ano' => $Exame->ano]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exame $exame)
    {
        //Chama a view que permite editar os dados do candidato
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $candidato = User::find($id);

        $candidato->nome = $request->nome;
        $candidato->email = $request->email;
        $candidato->telefone = $request->telefone;
        $candidato->nacionalidade = $request->nacionalidade;
        $candidato->data_nascimento = $request->data_nascimento;

        $candidato->save();
        return redirect()->route('candidato_perfil', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exame $exame)
    {
        // Apaga no banco de dados
    }

    public function perfil(){

        $query = User::all();
        $dados = $query->find(Auth::id());


        return view('user.candidato.perfil', ['candidato_dados'=> $dados]);
    }

}
