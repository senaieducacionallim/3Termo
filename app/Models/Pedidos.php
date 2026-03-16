<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    protected $fillable = [
        'user_id', 
        'total', 
        'desconto', 
        'status', 
        'codigo_rastreio', 
        'observacoes'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
