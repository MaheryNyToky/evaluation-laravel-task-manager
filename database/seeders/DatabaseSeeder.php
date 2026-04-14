<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Création d'un pool de 10 tags disponibles dans l'application
        $tags = \App\Models\Tag::factory(10)->create();

        // 2. Création de ton compte Admin de test
        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        // 3. Génération de 3 projets pour l'admin, contenant chacun 5 tâches
        \App\Models\Project::factory(3)
            ->for($admin)
            ->has(
                \App\Models\Task::factory(5)->afterCreating(function (\App\Models\Task $task) use ($tags) {
                    // Attache dynamiquement entre 1 et 3 tags aléatoires à chaque nouvelle tâche
                    $task->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
                })
            )
            ->create();

        // 4. Création du compte Utilisateur classique demandé dans le livrable
        $user = \App\Models\User::factory()->create([
            'name' => 'Utilisateur Classique',
            'email' => 'user@test.com',
            'password' => bcrypt('password'),
        ]);

        // 5. Génération de 2 projets pour l'utilisateur, contenant chacun 3 tâches
        \App\Models\Project::factory(2)
            ->for($user)
            ->has(
                \App\Models\Task::factory(3)->afterCreating(function (\App\Models\Task $task) use ($tags) {
                    $task->tags()->attach($tags->random(rand(1, 2))->pluck('id'));
                })
            )
            ->create();
    }
}
