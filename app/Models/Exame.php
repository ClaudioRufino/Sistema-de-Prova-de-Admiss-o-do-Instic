<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidato;
class Exame extends Model
{
    use HasFactory;

    protected $fillable =[
        'ano',
        'vagas',
        'exame_data',
        'preco',
        'exame_hora_inicio',
        'exame_hora_termino'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function candidatos(){
        return $this->hasMany(Candidato::class);
    }

    public function perguntas(){
        return $this->belongsToMany(Pergunta::class);
    }

}
