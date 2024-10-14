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

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
          ], [
            'email.required' => 'preencha campo email',
            'email.email' => 'preencha um email válido',
            'password.required' => 'digite uma senha válida',
            'password.confirmed' => 'senhas digitadas são diferentes',
          ]);


        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar o usuário após o cadastro
        Auth::login($user);

        // Redirecionar para a página inicial ou outra página após o cadastro
        return redirect()->route('tweets.index')->with('success', 'Cadastro realizado com sucesso!');
    }
}
