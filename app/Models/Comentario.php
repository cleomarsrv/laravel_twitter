<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    // proteger o modelo contra a inserção de dados indesejados
    protected $fillable = ['comentario','tweet_id','user_id'];

    public function user()
    {
        // indica que o modelo Comentario pertence a um Usuário, (comentário tem uma chave estrangeira que referencia usuário)
        return $this->belongsTo(User::class);
    }

    public function tweet()
    {
        // indica que o modelo Comentario pertence a um Tweet, (comentário tem uma chave estrangeira que referencia a tweet)
        return $this->belongsTo(Tweet::class);
    }
}
