<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExameController;
use App\Http\Controllers\PautaController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProvaController;
use App\Models\Candidato;
use Illuminate\View\ViewName;
use Illuminate\View\Calendar;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('exame', ExameController::class);
Route::post('candidato', [CandidatoController::class, 'store'])->name('candidato.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('candidato', CandidatoController::class)->except(['store']);
    Route::get('/pauta', [ProvaController::class, 'index']);
    Route::get('/perfil', [CandidatoController::class, 'perfil'])->name('candidato_perfil');
    Route::resource('prova', ProvaController::class);

    Route::get('pauta_antes', [PautaController::class, 'pauta_antes'])->name('pauta_antes');

    Route::get('prova_antes' , [ProvaController::class, 'prova_antes'])->name('prova_antes');

    Route::get('/prova_depois/{id}', function($id){
        return view('user/exame/prova_depois', ['id'=>$id]);
    })->name('prova_depois');

    Route::get('/calendar', function(){
        return view('layout/componentes/calendar');
    })->name('calendar');

    Route::get('/sgpai', function () {
        return view('auth.login');
    })->middleware(['auth', 'verified'])->name('login');

    
});

Route::get('/registrar', function(){
    return view('user.candidato.registrar');
})->name('registrar');


Route::get('/cadastro_sucesso', function(){
    return view('cadastro_sucesso');
})->middleware(['auth'])->name('cadastro_sucesso');

Route::get('/dashboard', [CandidatoController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');

Route::get('login_erro', function(){
    return view('login_erro');
});


Route::get('/cadastrar_pergunta', [PerguntaController::class, "edit"])
->middleware(['auth', 'verified'])->name('pergunta.edit');

Route::post('/guardar_pergunta', [PerguntaController::class, "update"])
->middleware(['auth', 'verified'])->name("pergunta.update");


Route::get('/perguntas', [PerguntaController::class, "index"])
->middleware(['auth', 'verified'])->name("perguntas");

Route::get('exame', [ExameController::class, 'create'])
->middleware(['auth', 'verified'])->name("exame.create");

Route::get('listar', [ExameController::class, 'index'])
->middleware(['auth', 'verified'])->name("exame.index");

Route::get('editar_exame', [ExameController::class, 'edit'])
->middleware(['auth', 'verified'])->name("exame.edit");

Route::get('listar_exame', [ExameController::class, 'update'])
->middleware(['auth', 'verified'])->name("exame.update");



Route::get('/notaFinal_imprimir/{id}', [ProvaController::class, 'notaFinal_imprimir'])->name('notaFinal_imprimir');



Route::get('/teste', function(){
    return view('teste');
});

require __DIR__.'/auth.php';
