# Task Manager - Évaluation Laravel

## Description
Application web de gestion de tâches (type Trello) développée dans le cadre de l'évaluation Laravel. Elle permet de gérer des projets, d'y associer des tâches, et de catégoriser ces tâches avec des tags (relations 1:N et N:N).

## Membres du groupe
- [Ton Prénom] [Ton Nom]

## Prérequis
- Docker Desktop (ou OrbStack)
- Composer

## Instructions d'installation
1. Cloner le dépôt : `git clone [URL_DU_DEPOT]`
2. Accéder au dossier : `cd task-manager`
3. Copier le fichier d'environnement : `cp .env.example .env`
4. Démarrer les conteneurs : `./vendor/bin/sail up -d`
5. Installer les dépendances PHP : `./vendor/bin/sail composer install`
6. Générer la clé de l'application : `./vendor/bin/sail artisan key:generate`
7. Exécuter les migrations et populer la base : `./vendor/bin/sail artisan migrate:fresh --seed`
8. Compiler les assets (CSS/JS) : `./vendor/bin/sail npm install && ./vendor/bin/sail npm run build`

## Identifiants de test
Pour évaluer l'application, vous pouvez utiliser les comptes suivants générés par le DatabaseSeeder :

**Compte Administrateur :**
- Email : admin@test.com
- Mot de passe : password

**Compte Utilisateur classique :**
- Email : user@test.com
- Mot de passe : password
