
# Gestion de Laverie - SanarLav

## Description

Ce projet est une application de gestion de laverie développée avec le framework Symfony. Elle permet de gérer les commandes de services de lavage, les abonnements, les réclamations, les utilisateurs, ainsi qu'une interface pour l'administration. Elle est conçue pour faciliter la gestion de l’activité et fournir une vue d'ensemble des opérations de la laverie.

## Execution du projet
    docker-compose up --build -d


## Identifiants par défaut

Des utilisateurs par défaut sont créés automatiquement dans la base de données :

    Administrateur
        Email : admin@example.com
        Mot de passe : SanarLav#2023

    Employé
        Email : employee@example.com
        Mot de passe : SanarLav2023

    Client
        Email : client@example.com
        Mot de passe : Test2023

## Technologies utilisées

* Backend : Symfony (PHP)
* Base de données : MySQL
* Frontend : Twig, HTML, CSS, JavaScript
* Gestion des dépendances : Composer
* Environnement de développement : Docker (facultatif, selon l'installation)

## Fonctionnalités Utilisateurs

 * Création et gestion de comptes utilisateurs : chaque utilisateur peut s'inscrire avec des informations personnelles comme le nom, le prénom, l'e-mail, le mot de passe, le numéro de téléphone, et l'adresse.
 * Rôles : les utilisateurs peuvent être assignés aux rôles suivants :
 * Administrateur : a accès aux fonctionnalités de gestion (commandes, abonnements, réclamations, utilisateurs, etc.).
* Employé : peut gérer les commandes et répondre aux réclamations.
* Client : peut passer des commandes, s'abonner à des services, et soumettre des réclamations.

## Commandes

Création de commandes : les utilisateurs peuvent passer des commandes pour divers services de lavage.
Suivi des commandes : les utilisateurs peuvent voir l'état de leurs commandes (en attente, en cours, terminée).
Historique des commandes : l'application enregistre toutes les commandes passées pour permettre un suivi historique.

## Abonnements

Abonnement aux services : les utilisateurs peuvent s'abonner à des offres spécifiques.
Gestion des abonnements : les administrateurs peuvent créer, modifier et supprimer des offres d'abonnement.
Suivi des abonnements : les utilisateurs peuvent voir les détails de leur abonnement et gérer leur renouvellement.

## Réclamations

Soumission de réclamations : les utilisateurs peuvent soumettre des réclamations en cas de problème.
Suivi des réclamations : l'utilisateur peut voir l'état de sa réclamation (ouverte, en cours de traitement, résolue).
Gestion des réclamations : les administrateurs et les employés peuvent consulter, répondre et clôturer les réclamations.

## Administration

Tableau de bord : Vue d'ensemble des commandes, abonnements, et réclamations en attente ou en cours.
Gestion des utilisateurs : possibilité d'ajouter, de supprimer et de modifier les informations des utilisateurs.
Statistiques : visualisation des données de l’activité (nombre de commandes, revenus, abonnements actifs, etc.).

