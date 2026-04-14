<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Sélectionne une action réaliste au hasard
            'title' => fake()->randomElement([
                'Créer la maquette sur Figma',
                'Configurer le serveur Docker',
                'Rédiger la documentation technique',
                'Corriger le bug d\'affichage CSS',
                'Optimiser les requêtes SQL',
                'Écrire les tests unitaires',
                'Préparer la réunion client'
            ]),
            'description' => fake()->realText(100),
            'is_completed' => fake()->boolean(20),
        ];
    }
}
