<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Fabricante;
use App\Models\Tipo;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';
    public $timestamps = false;

    protected $casts = ['created_at' => 'datetime: d-m-Y'];

    public function fabricante(): BelongsTo
    {
        return $this->belongsTo(Fabricante::class);
    }

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class);
    }

}
