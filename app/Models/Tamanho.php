<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamanho extends Model
{
    use HasFactory;

    protected $fillable = [
        'tamanho',
    ];

    public function produtos(){
        $this->hasMany(Produto::class );
    }
}
