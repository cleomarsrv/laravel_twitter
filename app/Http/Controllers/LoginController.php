<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {

    // redireciona usuarios logados para a pagina de tweets
    if (auth()->check()) {
      return redirect()->route('tweets.index');
    }
    
    return view('welcome');
  }

  public function store(Request $request)
  {

    // validacoes pertinentes
    $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ], [
      'email.required' => 'preencha campo email',
      'email.email' => 'preencha um email válido',
      'password.required' => 'digite uma senha válida',
    ]);

    // busca dados do usuario pelo email fornecido, e para de buscar no primeira ocorrência.
    $user = User::where('email', $request->input('email'))->first();

    // validação se dados informados estão corretos para prosseguir com o login
    if (!$user || !password_verify($request->input('password'), $user->password)) {
      return redirect()->route('login.index')->withErrors(['erro_usuario_senha' => 'Email ou senha inválidos']);
    }

    // com dados corretos, realiza o login
    Auth::loginUsingId($user->id);

    return redirect(route('tweets.index', ['show_all' => 0]));

  }

  public function destroy()
  {
    // faz processo de logout
    Auth::logout();

    return redirect()->route('login.index');
  }
}
