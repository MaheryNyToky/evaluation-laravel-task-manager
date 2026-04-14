<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Refonte du site vitrine',
                'Développement Application Mobile',
                'Migration de la base de données',
                'Campagne Marketing Q3',
                'Mise en place de l\'API REST'
            ]),
            // Utilisation d'un tableau de vraies descriptions métier en français
            'description' => fake()->randomElement([
                'Ce projet consiste à moderniser l\'interface utilisateur et à améliorer l\'expérience client globale.',
                'Une refonte complète de la structure de données pour optimiser les temps de réponse du serveur.',
                'Mise en place des nouvelles fonctionnalités demandées par le client lors du dernier comité de pilotage.',
                'Déploiement de l\'application sur les nouveaux serveurs cloud et configuration de l\'intégration continue.',
                'Analyse approfondie et correction des failles de vulnérabilité détectées lors du dernier audit de sécurité.'
            ]),
        ];
    }
}
