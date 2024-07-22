# Zoo Arcadia

Ce projet est un site web de gestion pour un zoo, permettant à différents types d'utilisateurs de se connecter : l'administrateur, les employés et les vétérinaires. Le site permet l'affichage et la gestion des habitats, des services et des animaux. Les visiteurs ont la possibilité de publier des avis et de contacter le zoo.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les éléments suivants sur votre machine :
- [PHP](https://www.php.net/) (version 8.2)
- [Composer](https://getcomposer.org/)
- [Symfony CLI](https://symfony.com/download)
- [MySQL](https://www.mysql.com/) (assurez-vous que MySQL est installé et configuré)
- [MongoDB](https://www.mongodb.com/) (assurez-vous que MongoDB est installé et configuré)

## Installation

1. **Cloner le dépôt :**
    ```bash
    git clone https://github.com/ccphung/zoo-broceliande
    cd zoo-broceliande
    ```

2. **Installer les dépendances PHP :**
    ```bash
    composer install
    ```

3. **Configurer les bases de données :**
   - **MySQL :**
     - Créez un fichier `.env.local` à partir de `.env` et configurez votre connexion MySQL :
       ```
       DATABASE_URL="mysql://db_user:db_password@localhost:3306/nom_de_votre_base_de_donnees_mysql"
       ```
     - Exécutez les migrations MySQL si nécessaire :
       ```bash
       php bin/console doctrine:database:create
       php bin/console doctrine:migrations:migrate
       ```

   - **MongoDB :**
     - Assurez-vous que MongoDB est en cours d'exécution sur votre machine.
     - Téléchargez et installez l'extension PHP `mongodb` (PECL) en suivant les instructions spécifiques à votre système d'exploitation :
       - Pour Linux (`*.so`) :
         ```bash
         sudo pecl install mongodb
         ```
       - Pour Windows (`*.dll`) :
         ```bash
         pecl install mongodb
         ```
       - Pour macOS, assurez-vous d'avoir les outils de développement Xcode installés avant d'installer l'extension.

     - Une fois l'extension installée, activez-la dans votre fichier `php.ini` en ajoutant la ligne suivante :
       - Pour Linux :
         ```ini
         extension=path/to/mongodb.so
         ```
       - Pour Windows :
         ```ini
         extension=path/to/mongodb.dll
         ```

     - Redémarrez votre serveur web ou PHP après avoir modifié `php.ini`.

     - Ajoutez une configuration pour MongoDB dans `.env.local` :
       ```
       MONGODB_URL="mongodb+srv://localhost:27017/nom_de_votre_base_de_donnees_mongodb"
       MONGODB_DB="nom_de_votre_base_de_donnees_mongodb"
       ```
     - Rechargez les fixtures :
       ```bash
       php bin/console doctrine:mongodb:fixtures:load
       ```

## Exécution du Projet en Local

1. **Démarrer le serveur Symfony :**
    ```bash
    symfony server:start
    ```

Le projet Symfony devrait maintenant être accessible à l'adresse `https://127.0.0.1:8000`.

## Scripts Disponibles

Dans ce projet, vous pouvez exécuter les scripts suivants :

- `composer install` : Installe les dépendances PHP.
- `symfony server:start` : Démarre le serveur de développement Symfony.
