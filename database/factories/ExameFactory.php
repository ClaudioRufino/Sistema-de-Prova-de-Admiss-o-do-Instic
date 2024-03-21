<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exame>
 */
class ExameFactory extends Factory
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
            'ano'=> $this->faker->year,
            'vagas'=> $this->faker->randomDigit,
            'exame_data' =>$this->faker->date,
            'exame_hora_inicio' => $this->faker->time,
            'exame_hora_termino' => $this->faker->time,
            'preco'=> $this->faker->randomDigit
        ];
    }
}
