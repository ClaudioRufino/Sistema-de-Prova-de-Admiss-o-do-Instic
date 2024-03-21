<?php

namespace Database\Factories;

use App\Models\Candidato;
use App\Models\Pergunta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidato_Pergunta>
 */
class Candidato_PerguntaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'candidato_resposta' => $this->faker->randomDigit,
            'candidato_id' => function(){
                return Candidato::factory()->create()->id;
            }
            ,
            'pergunta_id' => function(){
                return Pergunta::factory()->create()->id;
            }
        ];
    }
}
