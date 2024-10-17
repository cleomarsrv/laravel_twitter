<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Tweet $tweet, Request $request)
    {
        $user_id = Tweet::find($request->tweet_id)->user_id;

        $request->validate([
            'comentario' => 'required',
          ], [
            'comentario.required' => 'digite o comentário',
          ]);

        $comentario = Comentario::create([
            'comentario' => $request['comentario'],
            'tweet_id' => $request['tweet_id'],
            'user_id' => auth()->user()->id,
        ]); 

        // para permanecer na mesma url apos comentar
        $urlOrigem = url()->previous();
        $show = (strpos($urlOrigem, 'show_all=1') !== false) ? 1 : 0;

        return redirect(url()->route('tweets.index', ['show_all' => $show]) . "#tweet-" . $request->tweet_id);

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
