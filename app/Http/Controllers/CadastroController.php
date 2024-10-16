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
            'cadastro_name' => 'required|string|max:100',
            'cadastro_email' => 'required|email|unique:users,email',
            'cadastro_password' => 'required|confirmed'
          ], [
            'cadastro_email.required' => 'preencha campo email',
            'cadastro_email.email' => 'preencha um email válido',
            'cadastro_email.unique' => 'este email ja foi cadastrado',
            'cadastro_password_confirmation.required' => 'digite uma senha válida',
            'cadastro_password_confirmation.confirmed' => 'senhas digitadas são diferentes',
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
