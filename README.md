Tom Troc - Échange de livres entre particuliers

Tom Troc est une application web permettant de mettre en relation des lecteurs passionnés pour échanger leurs livres. 
Ce projet a été développé "from scratch" en **PHP natif** selon une architecture **MVC** (Modèle-Vue-Contrôleur), sans utilisation de framework, afin de démontrer la maîtrise des concepts fondamentaux du développement web.

### Fonctionnalités principales ###

- Authentification sécurisée : Inscription, Connexion (mots de passe hachés).
- Messagerie privée : Système de chat entre utilisateurs.
- Gestion de bibliothèque : Ajout (avec upload d'image), modification et suppression de livres.
- Catalogue public : Consultation des livres disponibles à l'échange.
- Profil utilisateur : Gestion des informations personnelles et avatar.
- Responsive Design : Interface adaptée aux mobiles et ordinateurs.

### Pré-requis techniques ###

- PHP : Version 8.0 ou supérieure.
- MySQL : Base de données relationnelle.
- Serveur Web : Apache (via XAMPP, WAMP, MAMP ou Docker).

### Guide d'installation ###

Pour installer le projet localement :

1. Récupération des fichiers
Clonez le dépôt ou téléchargez les fichiers dans le dossier racine de votre serveur web (ex: `htdocs`) :

git clone (https://github.com/Walhezer/Tom_Troc.git)

2. Base de données
Ouvrez votre gestionnaire de base de données (phpMyAdmin).
Créez une nouvelle base de données nommée tom_troc.
Importez le fichier tom_troc.sql situé à la racine du projet pour créer les tables et les données de test.

3. Configuration
Pour des raisons de sécurité, le fichier de configuration n'est pas versionné.
Rendez-vous dans le dossier config/.
Renommez le fichier Database.example.php (ou créez-le) en Database.php.
Modifiez ce fichier avec vos identifiants locaux.

### Compte de démonstration ###

Pour tester l'application, un compte utilisateur est pré-configuré :
Email : admin@tomtroc.com
Mot de passe : password123 (Note : Vous pouvez aussi créer un nouveau compte via la page d'inscription)

### Architecture du code ###

Le projet respecte le pattern MVC :
- app/Controllers/ : Gestion de la logique et des requêtes
- app/Models/ : Gestion des données et requêtes SQL (PDO)
- app/Views/ : Affichage HTML
- public/ : Assets (CSS, JS, Images) et point d'entrée (index.php)

