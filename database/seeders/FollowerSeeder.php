<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obter todos os usuários
        $users = User::all();

        // Para cada usuário, faça com que ele siga entre 3 e 6 usuários aleatórios
        foreach ($users as $user) {
            // Obtenha um número aleatório entre 3 e 6
            $numberOfFollowers = rand(3, 6);

            // Pegue usuários aleatórios, excluindo o próprio usuário
            $randomUsers = $users->where('id', '!=', $user->id)->random($numberOfFollowers);

            // Para cada usuário aleatório, adicione uma relação de seguidor
            foreach ($randomUsers as $follower) {
                // Evita duplicatas, se o usuário já está seguindo
                if (!$user->followings()->where('user_id', $follower->id)->exists()) {
                    $user->followings()->attach($follower->id);
                }
            }
        }
    }
}

