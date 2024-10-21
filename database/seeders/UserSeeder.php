<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{


    public function run()
    {
        $users = [
            [
                'name' => 'Diogo',
                'email' => 'diogo@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Marcos Daniel',
                'email' => 'marcos@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Cleomar Lisboa',
                'email' => 'cleomar@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Elon Musk',
                'email' => 'elon.musk@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Dwayne Johnson',
                'email' => 'dwayne.johnson@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Taylor Swift',
                'email' => 'taylor.swift@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Beyoncé Knowles',
                'email' => 'beyonce@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Mark Zuckerberg',
                'email' => 'mark.zuckerberg@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Cristiano Ronaldo',
                'email' => 'cristiano.ronaldo@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Ariana Grande',
                'email' => 'ariana.grande@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Rihanna',
                'email' => 'rihanna@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Kim Kardashian',
                'email' => 'kim.kardashian@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Leonardo DiCaprio',
                'email' => 'leonardo@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Miley Cyrus',
                'email' => 'miley.cyrus@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Jennifer Lopez',
                'email' => 'jlo@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Justin Bieber',
                'email' => 'justin.bieber@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Bill Gates',
                'email' => 'bill.gates@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Ellen DeGeneres',
                'email' => 'ellen@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'J.K. Rowling',
                'email' => 'jk.rowling@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Tom Hanks',
                'email' => 'tom.hanks@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Demi Lovato',
                'email' => 'demi.lovato@example.com',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

