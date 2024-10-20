<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CadastroController extends Controller
{

    // Processa o registro do usuário
    public function cadastrar(Request $request)
    {

      // validacoes pertinentes
      $request->validate([
            'cadastro_name' => 'required|string|max:200',
            'cadastro_email' => 'required|email|unique:users,email',
            'cadastro_password' => 'required|confirmed'
          ], [
            'cadastro_name.required' => 'digite o seu nome',
            'cadastro_name.max' => 'nome pode ter no máximo 200 caracteres',
            'cadastro_email.required' => 'digite campo email',
            'cadastro_email.email' => 'digite um email válido',
            'cadastro_email.unique' => 'este email já foi cadastrado',
            'cadastro_password.required' => 'digite uma senha válida',
            'cadastro_password.confirmed' => 'as senhas digitadas são diferentes',
          ]);

        // Criação do usuário
        $user = User::create([
            'name' => $request->cadastro_name,
            'email' => $request->cadastro_email,
            'password' => Hash::make($request->cadastro_password),
        ]);

        // Autenticar o usuário após o cadastro
        Auth::login($user);

        // Redirecionar para a página de tweets
        return redirect()->route('tweets.index')->with('success', 'Cadastro realizado com sucesso!');
    }
}
