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
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $user = auth()->user();
    
        // checando se parâmetro 'show_all' está na URL, padrão é 0(exibir meu feed)
        $showAll = $request->input('show_all', 0);
    
        if ($showAll == 1) {
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([

            'message' => 'required|string|max:240',

        ]);

        $request->user()->tweets()->create($validated);

        return redirect(route('tweets.index'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        //
    }
}
