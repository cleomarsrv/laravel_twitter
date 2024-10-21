<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comentario;
use App\Models\Tweet;
use App\Models\User;

class ComentarioSeeder extends Seeder
{
    public function run()
    {
        $comentarios = [
    'Muito interessante!',
    'Adorei este tweet!',
    'Que legal!',
    'Incrível como a tecnologia avança!',
    'Concordo plenamente!',
    'Excelente ponto de vista!',
    'Isso é realmente impressionante!',
    'Amei saber disso!',
    'Ótima reflexão!',
    'Com certeza, isso faz total sentido.',
    'Estou animado para ver onde isso vai dar.',
    'É incrível como a ciência muda nossas vidas.',
    'Esse assunto é muito relevante.',
    'Fiquei surpreso com essa informação!',
    'Você está absolutamente certo!',
    'Isso é exatamente o que precisamos discutir!',
    'Legal! Estou aprendendo muito com isso.',
    'O futuro parece promissor!',
    'Esses avanços são fascinantes!',
    'Essa inovação pode mudar tudo!',
    'Uau, eu não sabia disso!',
    'É bom ver pessoas falando sobre esses temas.',
    'Continuem assim, muito bom!',
    'Esses temas são essenciais para o nosso futuro.',
    'Fico feliz em ver essas discussões.',
    'Essa é uma abordagem nova e interessante.',
    'Eu gostaria de saber mais sobre isso!',
    'Precisamos de mais conversas assim!',
    'Essa informação é extremamente valiosa.',
    'Estou impressionado com sua análise!',
    'A ciência realmente transforma o mundo.',
    'Parabéns pelo tweet, muito informativo!',
    'Esses insights são importantes para todos nós.',
    'Isso é uma ótima notícia!',
    'Admiro sua visão sobre o assunto.',
    'Uma contribuição excelente!',
    'Essas ideias podem mudar nossa perspectiva.',
    'Estou totalmente de acordo!',
    'Muito bom ver isso sendo discutido!',
    'Isso abre muitas possibilidades.',
    'É sempre bom aprender algo novo!',
    'Essa é uma leitura obrigatória!',
    'Fico ansioso por mais informações assim.',
    'Esse tipo de conteúdo é o que precisamos!',
    'Vamos continuar essa conversa!',
    'Isso é um ótimo exemplo de inovação.',
];

        // Obter todos os tweets
        $tweets = Tweet::all();

        // Verificar se existem tweets
        if ($tweets->isEmpty()) {
            return;
        }

        // Criar entre 2 e 4 comentários para cada tweet
        foreach ($tweets as $tweet) {
            $numComentarios = rand(2, 4); // Número aleatório de comentários

            for ($i = 0; $i < $numComentarios; $i++) {
                Comentario::create([
                    'tweet_id' => $tweet->id,
                    'user_id' => User::inRandomOrder()->first()->id, // Atribui um usuário aleatório
                    'comentario' => $comentarios[array_rand($comentarios)], // Mensagem do comentário
                ]);
            }
        }
    }
}

