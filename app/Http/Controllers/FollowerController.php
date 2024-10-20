<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user){
        $folllower = auth()->user();
        $folllower->followings()->attach($user);

        // para permanecer na mesma url apos seguir/desseguir
        $urlOrigem = url()->previous();
        $show = (strpos($urlOrigem, 'show_all=1') !== false) ? 1 : 0;

        // se a requisacao foi feita no modal via AJAX, retorna JSON para correta exibição da mensagem de sucesso
        if (request()->ajax()) {
            return response()->json(['success' => 'agora você segue ' . $user->name]);
        }

        return redirect()->route('tweets.index', ['show_all' => $show])->with('success', 'agora você segue ' . $user->name);
    }

    public function unfollow(User $user){
        $folllower = auth()->user();
        $folllower->followings()->detach($user);

        // para permanecer na mesma url apos seguir/desseguir
        $urlOrigem = url()->previous();
        $show = (strpos($urlOrigem, 'show_all=1') !== false) ? 1 : 0;

        // se a requisacao foi feita no modal via AJAX, retorna JSON para correta exibição da mensagem de sucesso
        if (request()->ajax()) {
            return response()->json(['success' => 'você deixou de seguir ' . $user->name]);
        }

        return redirect()->route('tweets.index', ['show_all' => $show])->with('success', 'você deixou de seguir ' . $user->name);
    }

    public function getUser($id)
    {
        
        $authUserId = auth()->user()->id;
        $user = User::find($id);
        
        // Verifica se o usuário logado é o mesmo que está sendo visualizado
        $is_self = $authUserId == $user->id;

        // Verifique se o usuário atual está seguindo este usuário
        $isFollowing = auth()->user()->followings()->where('user_id', $user->id)->exists();
    
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'is_following' => $isFollowing,
            'is_self' => $is_self,
        ]);
    }

}
