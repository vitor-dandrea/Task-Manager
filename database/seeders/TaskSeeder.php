<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::factory()
            ->count(10)
            ->sequence(
                ['status' => 'pendente'],
                ['status' => 'em andamento'],
                ['status' => 'concluído']
            )
            ->create();
    }
}