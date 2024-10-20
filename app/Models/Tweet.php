<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
    ];
    public function user(): BelongsTo
    {
        // indica que o modelo Tweet pertence a um Usuário, (tweet tem uma chave estrangeira que referencia usuário)
        return $this->belongsTo(User::class);
    }

    public function comentarios(): HasMany

    {
        //  relação de um para muitos, um tweet tem muitos comentários.
        return $this->hasMany(Comentario::class);
    }

}
