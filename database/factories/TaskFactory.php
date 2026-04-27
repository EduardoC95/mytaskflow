<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        $statuses = ['pending', 'completed'];
        $priorities = ['low', 'medium', 'high'];

        $status = $this->faker->randomElement($statuses);

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'due_date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'priority' => $this->faker->randomElement($priorities),
            'status' => $status,
            'completed_at' => $status === 'completed' ? now() : null,
        ];
    }
}
