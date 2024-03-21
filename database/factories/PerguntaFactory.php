<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pergunta>
 */
class PerguntaFactory extends Factory
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
            'questao' => $this->faker-> randomDigit,
            'cotacao'=> $this->faker-> randomDigit,
            'disciplina'=> $this->faker-> word,
            'sistema_resposta'=> $this->faker-> randomDigit
            // 'resposta_candidato' => $this->faker-> randomDigit
        ];
    }
}
