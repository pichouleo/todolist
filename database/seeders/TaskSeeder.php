<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Génération de tâches simulées
        for ($i = 1; $i <= 10; $i++) {
            Task::create([
                'name' => 'Task ' . $i,
                'user_id' => 1, // Remplacez par l'ID de l'utilisateur approprié
            ]);
        }
    }
}
