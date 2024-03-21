<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Pergunta extends Model
{
     public $table = "User_Pergunta";

    use HasFactory;

    protected $fillable = [
        'pergunta_id', 'candidato_id', 'candidato_resposta'
    ];
}
