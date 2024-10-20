<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TweetController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();
    
        // checando se parâmetro 'show_all' está na URL, padrão é 0(exibir meu feed)
        $showAll = $request->input('show_all', 0);
    
        if ($showAll == 1) {
            // buscar todos os tweets de todos os usuarios
            $tweets = Tweet::with('user', 'comentarios')->orderBy('created_at', 'desc')->get();
        } else {

            // Exibir apenas os tweets do usuário logado e quem ele segue
            $followingIds = $user->followings()->pluck('users.id')->toArray();
            // Adiciona o próprio usuário à consulta
            $followingIds[] = $user->id;
            $tweets = Tweet::with('user', 'comentarios')
                           ->whereIn('user_id', $followingIds)
                           ->orderBy('created_at', 'desc')
                           ->get();
        }
    
        // todos os usuários para opcao seguir/desseguir
        $users = User::all();
    
        return view('tweets.index', compact('tweets', 'users', 'showAll'));
    }

    public function store(Request $request): RedirectResponse
    {
        // validação da publicação: estar preenchida e simulação de tweet limitado a 1000caracteres
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ], 
        [
            'message.required' => 'digite algo para publicar',
            'message.max' => 'digite no máximo 1000 caracteres',
        ]);

        // criação de um novo tweet com os dados validados para o usuário autenticado
        $request->user()->tweets()->create($validated);

        // para permanecer na mesma url apos publicar
        $urlOrigem = url()->previous();
        $show = (strpos($urlOrigem, 'show_all=1') !== false) ? 1 : 0;

        return redirect(route('tweets.index',  ['show_all' => $show]))->with('success', 'tweet postado!');
    }

    public function create()
    {
        //
    }


    public function show(Tweet $tweet)
    {
        //
    }

    public function edit(Tweet $tweet)
    {
        //
    }

    public function update(Request $request, Tweet $tweet)
    {
        //
    }

    public function destroy(Tweet $tweet)
    {
        //
    }
}
