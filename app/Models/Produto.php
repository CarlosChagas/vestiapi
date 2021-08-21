<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tamanho;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'codigo',
        'preco',
        'quantidade',
        'id_categoria',
        'id_tamanho',
        'composicao',
        'imagem'
    ];

    public function tamanho(){
        return $this->belongsTo(Tamanho::class, 'id_tamanho');
    }
}
