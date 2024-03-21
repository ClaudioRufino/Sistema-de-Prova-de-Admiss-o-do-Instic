<?php

namespace Database\Factories;

use App\Models\Exame;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidato>
 */
class CandidatoFactory extends Factory
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
            'nome' => $this->faker->name,
            'email'=> $this->faker->email,
            'telefone'=> $this->faker->phoneNumber,
            'curso'=> $this->faker->name,
            'data_nascimento'=> $this->faker->date,
            'bi'  =>  $this->faker->word,
            'sexo' => $this->faker->randomLetter,
            'nacionalidade' => $this->faker->country,
            'provincia_nascimento' => $this->faker->state,
            'qualidades' => $this->faker->text,
            'exame_id'=> function(){
                return Exame::factory()->create()->id;
                }
            ];
    }
}
