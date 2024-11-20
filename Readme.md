# ZooArcadia

Zoo Arcadia est une application de gestion de zoo développée en PHP. Elle permet de gérer les animaux, les habitats, les services, les utilisateurs, les horaires d'ouverture, les avis, et plus encore.

# Table des matières

 . Description
 .Technologies utilisées
 .Installation
 .Structure du projet
 .Utilisation
 .Contributions
 .Licence

# Description :
ArcadiaZoo est une application web interactive conçue pour gérer efficacement un zoo. Elle combine plusieurs technologies modernes pour fournir :
Une expérience utilisateur fluide.
Une gestion optimisée des habitats, des animaux, des avis visiteurs, des services proposés, et des rapports vétérinaires.
Des interactions dynamiques via API pour des tâches rapides comme la gestion des animaux ou la suppression des avis.
L'application offre des interfaces pour les administrateurs, les employés et les visiteurs du zoo.

# Technologies utilisées
## Front-end :

 . HTML5/CSS3 : Structure et style des pages.
 . Bootstrap 5 : Framework CSS pour une interface utilisateur réactive.
 . JavaScript Vanilla : Interactions dynamiques sur les pages.
 
## back-end :
 . PHP Vanilla : Gestion des requêtes et logique serveur.
 . PHP Mailer : Gestion des emails pour le formulaire de contact et la création de comptes.
 . API REST : Communication entre le client et le serveur pour des actions rapides (ex. : suppression, consultation).
Base de données
 . MySQL : Base de données relationnelles pour les habitats, les animaux et les utilisateurs.
 . MongoDB : Stockage le nombre de consultation par animal (NoSQL).
 . Composer : Gestionnaire de dépendances PHP.
 . Docker : Conteneurisation du projet pour une installation simplifiée.

# Installation
Prérequis
PHP 8.2
MySQL
MongoDB
Composer
Docker
npm

# Étapes
Clonez le projet :

git clone https://github.com/rabaaSourour/ArcadiaZoo.git
cd ArcadiaZoo
Installer les dépendances PHP :

composer install
Configurez les bases de données :

MySQL : Importez les scripts SQL du dossier src/Database/migrations.
MongoDB : Connectez-vous à votre instance MongoDB et créez une collection pour les rapports.
Configurez les variables dans Config.php:

php

define('DB_HOST', 'localhost');
define('DB_NAME', 'arcadia');
define('DB_USER', '');
define('DB_PASS', '');
Lancez le serveur :

Local : Placez le projet dans htdocs(XAMPP) et recevez à http://localhost/ArcadiaZoo.
Docker :
docker compose up --build
Structure du projet

ArcadiaZoo/
├── public/
│   ├── assets/
│   ├── styles/
├── src/
│   ├── admin/
│   ├── Controller/
│   ├── Database/
│   ├── Model/
│   ├── views/
│       ├── pages/
│       ├── base_view.php
├── Config.php
├── index.php
├── README.md

public/ : Contient les fichiers publics (CSS, JS, images).
src/ : Logique principale (contrôleurs, modèles, vues).
Config.php : Configuration de la base de données.
index.php : Point d'entrée principal.

# Utilisation
Visiteur
Naviguez entre les habitats et découvrez les animaux.
Contacter le zoo.
Laissez un avis après votre visite.
Employé
Connectez-vous pour ajouter des repas ou valider les avis.
Administrateur
Gérez les services, avis et horaires via le tableau de bord.
Vétérinaire
Ajouter des rapports sur la santé des animaux.

## Contributions
Créez une branche pour vos modifications :

git checkout -b feature/nom-de-la-fonctionnalite
Testez vos modifications et soumettez une Pull Request.

# Licence : 
Ce projet est sous licence MIT . Vous êtes libre de l'utiliser, de le modifier et de le distribuer.
