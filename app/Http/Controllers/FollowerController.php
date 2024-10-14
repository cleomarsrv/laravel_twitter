<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user){
        $folllower = auth()->user();
        $folllower->followings()->attach($user);

        return redirect()->route('tweets.index')->with('success', 'seguido com sucesso');
    }

    public function unfollow(User $user){
        $folllower = auth()->user();
        $folllower->followings()->detach($user);

        return redirect()->route('tweets.index')->with('success', 'você deixou de seguir este usuário');
    }

}
