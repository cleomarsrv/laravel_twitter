<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user){

        // follower é o próprio usuário logado
        $follower = auth()->user();
        
        // cria uma nova relação entre o usuário autenticado($follower) e outro usuário ($user). método followings definido em \App\Models\User
        $follower->followings()->attach($user);

        // permanecer na mesma url apos seguir/desseguir
        $urlOrigem = url()->previous();
        $show = (strpos($urlOrigem, 'show_all=1') !== false) ? 1 : 0;

        // se a requisacao foi feita no modal via AJAX, retorna JSON para correta exibição da mensagem de sucesso
        if (request()->ajax()) {
            return response()->json(['success' => 'agora você segue ' . $user->name]);
        }

        // retorno para requisição normal, mantendo a rota atual 
        return redirect()->route('tweets.index', ['show_all' => $show])->with('success', 'agora você segue ' . $user->name);
    }

    public function unfollow(User $user){

        $follower = auth()->user();

        // desfaz a relação entre o usuário autenticado($follower) e outro usuário ($user)
        $follower->followings()->detach($user);

        // para permanecer na mesma url apos seguir/desseguir
        $urlOrigem = url()->previous();
        $show = (strpos($urlOrigem, 'show_all=1') !== false) ? 1 : 0;

        // se a requisacao foi feita no modal via AJAX, retorna JSON para correta exibição da mensagem de sucesso
        if (request()->ajax()) {
            return response()->json(['success' => 'você deixou de seguir ' . $user->name]);
        }

        // retorno para requisição normal, mantendo a rota atual 
        return redirect()->route('tweets.index', ['show_all' => $show])->with('success', 'você deixou de seguir ' . $user->name);
    }

    public function getUser($id)
    {
        // Verifica se o usuário logado é o mesmo que está sendo visualizado
        $authUserId = auth()->user()->id;
        $user = User::find($id);
        $is_self = $authUserId == $user->id;

        // Verifique se o usuário logado está seguindo este usuário
        $isFollowing = auth()->user()->followings()->where('user_id', $user->id)->exists();
    
        // retorna dados em JSON, para que o front-end exiba de forma adequada na lista de usuários e modal usuário.
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'is_following' => $isFollowing,
            'is_self' => $is_self,
        ]);
    }

}
