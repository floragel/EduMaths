# Edumaths - Plateforme d'Aide en Mathématiques

Edumaths est une plateforme éducative dynamique développée en PHP et MySQL, conçue pour faciliter l'accès aux ressources pédagogiques en mathématiques. Le site permet aux étudiants de consulter des cours et de rencontrer leur équipe enseignante, tout en offrant une interface de gestion robuste pour les administrateurs.

## 🚀 Fonctionnalités

### Interface Étudiant
* **Consultation des cours** : Affichage dynamique des derniers cours de maths avec les noms des professeurs associés.
* **Système de recherche** : Barre de recherche intégrée pour filtrer les cours par thématique.
* **Détails du contenu** : Pages spécifiques pour approfondir chaque sujet via un identifiant unique.
* **Équipe pédagogique** : Présentation des professeurs et de leurs descriptions.

### Interface Administration
* **Espace sécurisé** : Accès restreint via une session administrateur.
* **Gestion CRUD** : Possibilité d'ajouter, modifier ou supprimer des cours et des produits pédagogiques.
* **Tableau de bord** : Vue d'ensemble sur le contenu existant avec outils d'édition rapide.

## 🛠️ Technologies Utilisées

* **Backend** : PHP (gestion des sessions et logique métier).
* **Base de Données** : MySQL (via extension PDO).
* **Frontend** : HTML5, CSS3 (Bootstrap 4), JavaScript.
* **Design** : Basé sur le template "Edukate" de HTML Codex.

## 📦 Installation Locale

1.  **Cloner le projet** :
    ```bash
    git clone https://github.com/floragel/EduMaths.git
    ```
2.  **Configurer la base de données** :
    * Créer une base de données nommée `edumaths`.
    * Vérifier les identifiants de connexion (`localhost`, `root`, etc.) dans le fichier `database.php`.
3.  **Lancer le serveur** :
    * Utiliser un environnement de développement comme XAMPP, WAMP ou MAMP.
    * Placer les fichiers dans le répertoire racine du serveur (`htdocs` ou `www`).

## 📜 Licence et Crédits

* **Template** : Edukate par [HTML Codex](https://htmlcodex.com).
* **Licence** : Ce projet respecte les conditions d'utilisation définies par l'auteur du template.

---
*Projet réalisé par Nayl Lahlou dans le cadre du développement d'outils pédagogiques numériques.*

