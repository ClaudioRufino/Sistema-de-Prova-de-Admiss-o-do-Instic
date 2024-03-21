<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'questao',
        'cotacao',
        'disciplina',
        'sistema_resposta'
    ];

    // Funções de relacionamentos com as tabelas

    public function exames(){
        return $this->belongsToMany(Exame::class);
    }

    public function candidatos(){
        return $this->belongsToMany(Candidato::class);
    }
}
