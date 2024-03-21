<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'password',
        'telefone',
        'curso',
        'data_nascimento',
        'bi',
        'sexo',
        'nacionalidade',
        'qualidades',
        'exame_id'
    ];
}
