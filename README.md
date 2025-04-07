# France Academy

![France Academy Logo](public/dist/images/LOGO.png)

🎓 **Qu'est-ce que France Academy ?**  
France Academy est un Environnement Numérique de Travail (ENT) avancé permettant la gestion centralisée de plusieurs établissements scolaires. Notre solution offre une plateforme unique où chaque école conserve son propre espace tout en bénéficiant d'outils partagés pour l'administration, l'enseignement et le suivi des élèves.

✨ **Caractéristiques principales**  
- **Architecture multi-tenant** : Chaque établissement dispose de sa propre base de données isolée  
- **Interfaces personnalisées selon le rôle** (administrateur, professeur, élève)  
- **Gestion complète des filières et matières** avec attribution de coefficients  
- **Suivi précis des classes et des élèves**  
- **Système de notation avancé** avec calcul automatique des moyennes

🛠️ **Technologies utilisées**  
- **Backend** : Laravel (PHP)  
- **Base de données** : PostgreSQL  
- **Frontend** : HTML, CSS, Bootstrap, JavaScript  
- **Environnement de développement** : Vagrant, Homestead

📋 **Prérequis**  
- PHP >= 8.0  
- Composer  
- PostgreSQL  
- Vagrant et VirtualBox pour l'environnement de développement
  

🚀 **Installation**  
1. Clonez le repository  
```bash
git clone https://github.com/votre-utilisateur/france-academy.git
cd france-academy

2. **Configurez Homestead.** Suivez notre tutoriel complet pour l'installation de l'environnement de développement : [Installation de Homestead pour Laravel](lien_vers_tutoriel)

3. **Installez les dépendances**  
```bash
composer install
npm install

🧩 **Structure de l'application**  
- **Modèle multi-tenant** : Chaque école dispose d'une base de données séparée  
- **Contrôle d'accès basé sur les rôles** : Administrateurs, professeurs, élèves  
- **Tableau de bord personnalisé** pour chaque type d'utilisateur  
- **Modules intégrés** pour la gestion des filières, matières, classes et notes

👥 **Rôles utilisateurs**  
| Rôle        | Permissions principales |
|-------------|-------------------------|
| Administrateur | Gestion complète de l'établissement, utilisateurs, filières, matières |
| Professeur  | Gestion des cours, notes, communication avec les élèves |
| Élève       | Consultation des notes, emploi du temps, ressources de cours |

