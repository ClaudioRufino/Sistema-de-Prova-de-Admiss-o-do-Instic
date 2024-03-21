<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Candidato;
use App\Models\Candidato_Pergunta;
use App\Models\Exame;
use App\Models\Exame_Pergunta;
use App\Models\Pergunta;
use Database\Factories\Candidato_PerguntaFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Exame::factory(20)->create();
        Candidato::factory(20)->create();
        Pergunta::factory(20)->create();
        Exame_Pergunta::factory(20)->create();
        Candidato_Pergunta::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
