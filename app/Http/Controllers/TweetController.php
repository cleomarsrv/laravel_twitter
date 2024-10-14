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
    public function index() : View
    {
        return view('tweets.index', [

            'tweets' => Tweet::with('user')->latest()->get(),
            'comentarios' => Comentario::with('tweet')->latest()->get(),
            'users' => User::all()
        ]);
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([

            'message' => 'required|string|max:240',

        ]);

        $request->user()->tweets()->create($validated);

        return redirect(route('tweets.index'));
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
