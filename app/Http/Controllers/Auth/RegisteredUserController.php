<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidato;
use App\Models\Exame;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('user.candidato.registrar');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //: RedirectResponse
        

        $id_exame = Exame::latest()->value('id');
        // return $id_exame;

        $sexo = $request->input('sexo');

        $user = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            'telefone' => $request->telefone,
            'curso' => $request->curso,
            'data_nascimento'=> $request->data_nascimento,
            'bi' => $request->bi,
            'sexo' => $sexo,
            'nacionalidade'=> $request->nacionalidade, 
            'qualidades' => $request->qualidades,
            'senha' =>Hash::make($request->senha),
            'confirmar_senha' => Hash::make($request->confirmar_senha),
            'exame_id'=>$id_exame
        ]);

        event(new Registered($user));
        Auth::login($user);
        return view('cadastro_sucesso');

        // return redirect(RouteServiceProvider::HOME);
    }
}
