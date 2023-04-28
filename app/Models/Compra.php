<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Forma_pag;
use App\Models\Cliente;
use App\Models\Produto;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compra';

    protected $casts = ['created_at' => 'datetime: d-m-Y'];

    public function forma_pag(): BelongsTo
    {
        return $this->belongsTo(Forma_pag::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}
