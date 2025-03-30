<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define os valores padrão para o modelo Task.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(3),
            'status' => 'pendente',
            'due_date' => $this->faker->dateTimeBetween('now', '+30 days')->format('Y-m-d'),
        ];
    }

    /**
     * Estados adicionais para facilitar os testes
     */
    public function pendente()
    {
        return $this->state([
            'status' => 'pendente',
        ]);
    }

    public function emAndamento()
    {
        return $this->state([
            'status' => 'em andamento',
        ]);
    }

    public function concluido()
    {
        return $this->state([
            'status' => 'concluído',
        ]);
    }

    public function atrasada()
    {
        return $this->state([
            'due_date' => $this->faker->dateTimeBetween('-30 days', '-1 day')->format('Y-m-d'),
        ]);
    }
}