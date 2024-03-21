<?php

namespace Database\Factories;

use App\Models\Exame;
use App\Models\Pergunta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exame_Pergunta>
 */
class Exame_PerguntaFactory extends Factory
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
            'exame_id'=>function(){
                return Exame::factory()->create()->id;
            },
            'pergunta_id' => function(){
                return Pergunta::factory()->create()->id;
            }
        ];
    }
}
