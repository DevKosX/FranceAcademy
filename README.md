# France Academy - Une Sorte d'ENT Scolaire Multi-Écoles

## Description du Projet

France Academy est un projet de création d'un Environnement Numérique de Travail (ENT) pour les écoles. Il a été conçu pour permettre la gestion centralisée de plusieurs établissements scolaires, offrant un ensemble d fonctionnalités pour les administrateurs, les professeurs et les élèves. L'objectif est de fournir une plateforme unique pour la gestion des données, le suivi des cours, et la communication au sein de chaque école.

## Fonctionnalités Principales

*   **Gestion Multi-Écoles :** Chaque école (tenant) possède sa propre base de données isolée, assurant la confidentialité et la personnalisation des données.

*   **Authentification :**
    *   Gestion centralisée des utilisateurs (administrateurs, professeurs, élèves).
    *   Redirection des utilisateurs vers leurs dashboards personnalisés en fonction de leur rôle.

*   **Tableau de bord (Dashboard) :**
    *   Interface intuitive pour chaque type d'utilisateur (administrateur, professeur, élève).

*   **Gestion des Filières et des Matières :**
    *   Création, modification et suppression des filières.
    *   Association des matières aux filières avec gestion des coefficients.
    *   Possibilité d'affecter un professeur responsable à une matière dans une filière.

*   **Gestion des Classes et des Élèves :**
    *   Affichage des classes affiliées à une filière.
    *   Possibilité d'affilier un élève à une classe.

*   **Visualisation des Notes et Calcul des Moyennes :**
    *   Affichage des notes par matière pour chaque élève.
    *   Calcul automatique des moyennes par matière et de la moyenne générale, avec prise en compte des matières optionnelles.

*   **Autres Fonctionnalités :**
    *   Gestion des professeurs et des matières.
    *   Système de seeders pour initialiser les bases de données des tenants.
    *   Design épuré et cohérent avec Bootstrap.
    *   Utilisation de DataTables pour faciliter la navigation dans les tableaux de données.

## Architecture Technique

*   **Framework :** Laravel (PHP).
*   **Base de données :** PostgreSQL.
*   **Modèle Multi-Tenant :** Bases de données séparées par tenant.
*   **Interface Utilisateur :** HTML, CSS, Bootstrap.
*   **Outils de Développement :** Vagrant, Homestead, Git, VirtualBox.

## Installation et Configuration

*   **Suivre ce tutoriel : ** https://apical.xyz/fiches/travailler_avec_laravel/installation_de_homestead_sous_windows_pour_developper_en_laravel
