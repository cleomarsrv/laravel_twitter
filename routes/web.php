<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// rotas para o recurso tweets, utilizando o TweetController.
// rotas protegida pelo middleware 'auth', acessível apenas por usuários autenticados
// método only usado para limitar ações HTTP padrão do Route::resource(), já que somente as ações index e store serão usadas no escopo deste teste
Route::resource('tweets', TweetController::class)
    ->only(['index', 'store'])
    ->middleware(['auth']);

Route::resource('comentarios',ComentarioController::class)
    ->only(['store']);

// rotas agrupadas, gerenciadas pelo LoginController
Route::controller(LoginController::class)->group(function () {
    
    //rota GET para a URL raiz, será atendida pelo método index do LoginController.
    Route::get('/', 'index')->name('login.index');

    // rota POST para a URL raiz, usada para enviar os dados do formulário de login
    //O método store do LoginController fará o processo de validação e autenticação.
    Route::post('/', 'store')->name('login.store');
    
    // rota GET para a URL /logout, para encerrar a sessão do usuário
    Route::get('/logout', 'destroy')->name('login.destroy');
  });

// rota POST usada para enviar os dados do formulário para cadastro de usuário, será atendida pelo método cadastrar do CadastroController.
Route::post('cadastrar', [CadastroController::class, 'cadastrar'])->name('cadastrar');

// rotas POST usada para processar ação de seguir/desseguir, a 1ª será atendida pelo método follow e a 2ª pelo método unfollow do FollowerController.
// rotas protegida pelo middleware 'auth', acessível apenas por usuários autenticados
Route::post('/users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('/users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

// rota GET usar para o método getUser do FollowerController fazer suas validações
Route::get('/user/{id}', [FollowerController::class, 'getUser'])->middleware('auth');

require __DIR__.'/auth.php';