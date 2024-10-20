<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Tweet $tweet, Request $request)
    {

        //validacoes pertinentes
        $request->validate([
            'comentario' => 'required|string|max:1000',
          ], [
            'comentario.required' => 'digite o comentário',
            'comentario.max' => 'digite no máximo 1000 caracteres',
          ]);

        // criacao do novo comentario no banco de dados
        $comentario = Comentario::create([
            'comentario' => $request['comentario'],
            'tweet_id' => $request['tweet_id'],
            'user_id' => auth()->user()->id,
        ]); 

        // para permanecer na mesma url apos comentar
        $urlOrigem = url()->previous();
        $show = (strpos($urlOrigem, 'show_all=1') !== false) ? 1 : 0;

        return redirect(url()->route('tweets.index', ['show_all' => $show]) . "#tweet-" . $request->tweet_id)->with('success', 'comentário postado!');

    }
 

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
