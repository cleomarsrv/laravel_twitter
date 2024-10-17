<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('welcome');
  }

  public function store(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ], [
      'email.required' => 'preencha campo email',
      'email.email' => 'preencha um email válido',
      'password.required' => 'digite uma senha válida',
    ]);

    $user = User::where('email', $request->input('email'))->first();

    if (!$user) {
      return redirect()->route('login.index')->withErrors(['erro_usuario_senha' => 'Email ou senha inválidos']);
    }

    if (!password_verify($request->input('password'), $user->password)) {
      return redirect()->route('login.index')->withErrors(['erro_usuario_senha' => 'Email ou senha inválidos']);
    }

    Auth::loginUsingId($user->id);

    return redirect(route('tweets.index', ['show_all' => 0]));

  }

  public function destroy()
  {
    Auth::logout();

    return redirect()->route('login.index');
  }
}