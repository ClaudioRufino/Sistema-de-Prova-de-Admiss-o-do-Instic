<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Exame;
use App\Models\User_Pergunta;
use App\Models\Pergunta;
use App\Models\User;
use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

use Barryvdh\DomPDF\Facade\Pdf;

// use PhpParser\Node\Expr\Cast\Object_;

class ProvaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    
    public function index()
    {
        $candidatos_notas = [];

        $id_exame = Exame::latest()->value('id');
        $ano_atual = date('Y');

        $total_vagas = DB::table('exames as e')
        ->select(DB::raw('e.vagas'))
        ->where('e.id', '=', $id_exame)
        ->where('e.ano', '=', $ano_atual)
        ->get();

        $vagas = $total_vagas[0]->vagas;;

        $lista_informatica = $this->lista_por_curso('Informatica', $vagas);
        $lista_telecomunicao = $this->lista_por_curso('Telecomunicacao', $vagas);

        return view('user.exame.pauta', ['lista_informatica' => $lista_informatica, 'lista_telecomunicacao'=>$lista_telecomunicao]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuario_id = Auth::id();
        $perguntas = Pergunta::all();
        $perguntas_mat = $this->perguntas_matematica($perguntas);
        $perguntas_fisica = $this->perguntas_fisica($perguntas);

        $ano_atual = date('Y');
        $id_exame = Exame::latest()->value('id');
      
        $dados_exame = DB::table('exames as e')
        ->select(DB::raw('e.exame_data, e.exame_hora_inicio,  e.exame_hora_termino'))
        ->where('e.id', '=', $id_exame)
        ->where('e.ano', '=', $ano_atual)
        ->get();

        return view('user.exame.prova_durante', ['perguntas_mat' => $perguntas_mat, 'perguntas_fisica' => $perguntas_fisica, 'usuario_id'=>$usuario_id, 'data'=>$dados_exame[0]->exame_data, 'hora_inicial'=> $dados_exame[0]->exame_hora_inicio, 'hora_final'=> $dados_exame[0]->exame_hora_termino]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $respostas = [
                      $request->resposta_1, $request->resposta_2, $request->resposta_3, $request->resposta_4,
                      $request->resposta_5, $request->resposta_6, $request->resposta_7, $request->resposta_8,
                      $request->resposta_9, $request->resposta_10, $request->resposta_11, $request->resposta_12,
                      $request->resposta_13, $request->resposta_14, $request->resposta_15, $request->resposta_16,
                      $request->resposta_17, $request->resposta_18, $request->resposta_19, $request->resposta_20
                    ];
        
        $j = 1;
        $id_usuario = Auth::id();
        for($i = 0; $i < count($respostas); $i++){
            if(!isset($respostas[$i])){
                $respostas[$i] = "vazio";
            }

            try {
                    $candidato_pergunta = User_Pergunta::create([
                        'candidato_id' => $id_usuario,
                        'pergunta_id' => $j,
                        'candidato_resposta' => $respostas[$i]
                    ]);
                    $j++;

                    } catch (\Throwable $th) {
                        return view('reenvio_prova');
                }
            }
            return redirect()->route('prova.show',  $id_usuario);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notaFinal = DB::table('perguntas as p')
            ->select(DB::raw('distinct c.id, sum(p.cotacao) OVER (PARTITION BY c.nome) as total'))
            ->join('user_pergunta as cp', 'cp.pergunta_id', '=', 'p.id')
            ->join('users as c', 'c.id', '=', 'cp.candidato_id')
            ->whereColumn('cp.candidato_resposta', '=', 'p.sistema_resposta')
            ->where('c.id' , '=', $id)
            ->get();

        $perguntas = Pergunta::all();
        $perguntas_mat = $this->perguntas_matematica($perguntas);
        $perguntas_fisica = $this->perguntas_fisica($perguntas);

        $candidato_respostas = DB::table('user_pergunta as c_p')
        ->select(DB::raw('c_p.candidato_resposta'))
        ->where('c_p.candidato_id', $id)
        ->get();

        $candidato = User::find($id);

        if(isset($notaFinal[0])){
            return view('user.candidato.notaFinal', ['candidato' => $candidato, 'nota' => $notaFinal[0]->total, 'perguntas_mat'=> $perguntas_mat, 'perguntas_fisica'=> $perguntas_fisica, 'c_respostas'=>$candidato_respostas]);
        }else{
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
            return view('user.candidato.index', ['candidatos' => $candidatos, 'nome'=> $usuario_nome, 'usuario_id'=>$usuario_id]);
        }
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
        // dd("Chegou em UPDATE" , $request->pergunta_1);
        
        Pergunta::where ('id', $id)->update([
            'resposta_candidato' => $request->pergunta_1,
        ]);

        return "Clicaste em UPDATE";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function acertou(int $id){
        $encontrado = 0;
        
        $notaFinal = DB::table('perguntas as p')
        ->select(DB::raw('distinct c.nome, sum(p.cotacao) OVER (PARTITION BY c.nome) as total'))
        ->join('user_pergunta as cp', 'cp.pergunta_id', '=', 'p.id')
        ->join('users as c', 'c.id', '=', 'cp.candidato_id')
        ->whereColumn('cp.candidato_resposta', '=', 'p.sistema_resposta')
        ->where('c.id', '=', $id)
        ->get();

        if(isset($notaFinal[0]->total)){
            $encontrado = $notaFinal[0]->total;
            return $encontrado;
        }else{
            return $encontrado;
        }
    }

    private function ordenacao($cand):array{
        for($i = 0; $i < count($cand) - 1; $i++){
            for($j = $i + 1; $j < count($cand); $j++){
                if($cand[$i]->nota < $cand[$j]->nota){
                    $aux = $cand[$i];
                    $cand[$i] = $cand[$j];
                    $cand[$j] = $aux;
                }
            }
        }
        return $cand;
    }

    private function candidatos_resultado($candidatos, $num_vagas):array{
        $contador = 0;
        $lista = [];
        for($i = 0; $i < count($candidatos); $i++){

            if($contador < $num_vagas && $candidatos[$i]->nota >= 10){
                $lista[$i] = (Object) [
                    'id' => $candidatos[$i]->id,
                    'bi' => $candidatos[$i]->bi,
                    'nome' => $candidatos[$i]->nome,
                    'curso' =>$candidatos[$i]->curso,
                    'nota' => $candidatos[$i]->nota,
                    'estado'=> 'Aprovado'];
            }else{
                $lista[$i] = (Object) [
                    'id' => $candidatos[$i]->id,
                    'nome' => $candidatos[$i]->nome,
                    'bi' => $candidatos[$i]->bi,
                    'curso' =>$candidatos[$i]->curso,
                    'nota' => $candidatos[$i]->nota,
                    'estado'=> 'Reprovado'
                ];
            }
        }
        return $lista;
    }
    
    function perguntas_matematica($perguntas){
        return $perguntas_mat = $perguntas->where('disciplina', 'Matematica');
    }

    function perguntas_fisica($perguntas){
        return $perguntas_mat = $perguntas->where('disciplina', 'Fisica');
    }

    function lista_por_curso(String $curso, int $total_vagas){
        $candidatos = DB::table('users as c')
        ->select(DB::raw('distinct c.id, c.bi, c.nome, c.curso'))
        ->where('c.curso', '=', $curso)
        ->get();

        $i = 0;
        foreach($candidatos as $candidato){

            $candidatos_notas[$i] = (Object)[ 
                'id'=> $candidato->id,
                'bi' => $candidato->bi,
                'nome' => $candidato->nome,
                'curso'=>$candidato->curso,
                'nota' => $this->acertou($candidato->id)
            ];
            $i++;
        }

        $candidatos = $this->ordenacao($candidatos_notas);
        $lista_atualizada = $this->candidatos_resultado($candidatos, $total_vagas);

        return $lista_atualizada;
    }

    function prova_antes(){
        $ano_atual = date('Y');
        $id_exame = Exame::latest()->value('id');
      
        $dados_exame = DB::table('exames as e')
        ->select(DB::raw('e.exame_data, e.exame_hora_inicio,  e.exame_hora_termino'))
        ->where('e.id', '=', $id_exame)
        ->where('e.ano', '=', $ano_atual)
        ->get();

        return view('user.exame.prova_antes', ['data'=>$dados_exame[0]->exame_data, 'hora_inicial'=> $dados_exame[0]->exame_hora_inicio, 'hora_final'=> $dados_exame[0]->exame_hora_termino]);
    }

    function notaFinal_imprimir(string $id){
        $notaFinal = DB::table('perguntas as p')
            ->select(DB::raw('distinct c.id, sum(p.cotacao) OVER (PARTITION BY c.nome) as total'))
            ->join('user_pergunta as cp', 'cp.pergunta_id', '=', 'p.id')
            ->join('users as c', 'c.id', '=', 'cp.candidato_id')
            ->whereColumn('cp.candidato_resposta', '=', 'p.sistema_resposta')
            ->where('c.id' , '=', $id)
            ->get();

        $perguntas = Pergunta::all();
        $perguntas_mat = $this->perguntas_matematica($perguntas);
        $perguntas_fisica = $this->perguntas_fisica($perguntas);

        $candidato_respostas = DB::table('user_pergunta as c_p')
        ->select(DB::raw('c_p.candidato_resposta'))
        ->where('c_p.candidato_id', $id)
        ->get();

        $candidato = User::find($id);
        $pdf = Pdf::loadView('welcome');
        return $pdf->download('invoice.pdf');

        // return view('user.candidato.notaFinal_imprimir', ['candidato' => $candidato, 'nota' => $notaFinal[0]->total, 'perguntas_mat'=> $perguntas_mat, 'perguntas_fisica'=> $perguntas_fisica, 'c_respostas'=>$candidato_respostas]);
    }
}
