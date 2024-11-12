# Zoo Arcadia

Ce projet est un site web de gestion pour un zoo, permettant à différents types d'utilisateurs de se connecter : l'administrateur, les employés et les vétérinaires. Le site permet l'affichage et la gestion des habitats, des services et des animaux. Les visiteurs ont la possibilité de publier des avis et de contacter le zoo.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les éléments suivants sur votre machine :
- [Docker Desktop](https://www.docker.com/products/docker-desktop/) (qui inclut Docker et Docker Compose)

## Installation

1. **Cloner le dépôt :**
    ```bash
    git clone https://github.com/ccphung/zoo-broceliande
    cd zoo-broceliande
    cd projet
    ```

2. **Créer et configurer le fichier `.env.local` à la racine du projet :**
    - Créez le fichier `.env.local` à partir du fichier `.env` existant et configurez les informations de votre base de données et autres services.
    - Exemple de configuration pour MySQL et MongoDB dans `.env.local` :
    
    ```ini
    # Base de données MySQL
    CLEARDB_DATABASE_URL="mysql://<db_user>:<db_password>@mysql/zoo?serverVersion=8.0"

    # Base de données MongoDB
    MONGODB_URL="mongodb://<db_user>:<db_password>@mongo:27017/zoo?authSource=admin"
    MONGODB_DB="zoo"

	# Variables d'environnement pour MySQL
    MYSQL_ROOT_PASSWORD=<db_root>
    MYSQL_DATABASE=zoo 
    MYSQL_USER=<db_user>
    MYSQL_PASSWORD=<db_password>
    
	# Variables pour PhpMyAdmin
    PMA_USER=<db_user>
    PMA_PASSWORD=<db_password>

	# Variables d'environnement pour MongoDB
    MONGO_INITDB_ROOT_USERNAME=<db_user>
    MONGO_INITDB_ROOT_PASSWORD=<db_password>
    ```
    Remplacez les valeurs suivantes par vos informations spécifiques :
    - `<db_user>` : nom d'utilisateur pour MySQL, MongoDB et PhpMyAdmin
    - `<db_password>` : mot de passe pour MySQL et MongoDB
    - `<db_root>` : mot de passe du root pour MySQL
 
3. **Configurer Mailtrap pour les Emails :**
    - Créez un compte sur [Mailtrap](https://mailtrap.io/).
    - Une fois connecté, allez dans "Email Testing" puis "Inboxes" et récupérez vos identifiants SMTP.
    - Ajoutez la configuration Mailtrap dans votre fichier `.env.local` :
    ```ini
    MAILER_DSN=smtp://<username>:<password>@smtp.mailtrap.io:<port>
    ```
    Remplacez `<username>`, `<password>` et `<port>` par les informations spécifiques de votre compte Mailtrap.

4. **Configurer AWS S3 pour le stockage des fichiers :**
    - Connectez-vous sur AWS.
    - Si vous n'avez pas encore de compte, inscrivez-vous sur [AWS](https://aws.amazon.com/fr/).
    - Créez un bucket S3.
    - Exemple de configuration pour AWS dans `.env.local` :
    ```ini
    APP_UPLOAD_SERVICE_URI_PREFIX=https://<bucket_name>.s3.amazonaws.com
    AWS_BUCKET_NAME=<bucket_name>
    AWS_ENDPOINT=s3.amazonaws.com
    AWS_REGION=<aws_region>
    AWS_SECRET_ACCESS_KEY=<your_aws_secret_access_key>
    AWS_ACCESS_KEY_ID=<your_aws_access_key_id>
    ```
    Remplacez les valeurs suivantes par vos informations :
    - `<bucket_name>` : le nom de votre bucket S3
    - `<aws_region>` : la région AWS, par exemple `us-west-1`
    - `<your_aws_secret_access_key>` : votre clé secrète AWS
    - `<your_aws_access_key_id>` : votre ID de clé d'accès AWS
       
## Exécution du Projet en Local avec Docker
1. **Démarrer les services Docker avec Docker Compose :**
    - Exécutez la commande suivante pour démarrer les services :
    ```bash
    docker-compose --env-file .env.local up --build -d
    ```
    Cette commande crée et démarre tous les containers nécessaires à l'application en spécifiant l'emplacement du fichier .env.local contenant les variables d'environnement.

2. **Installer les dépendances PHP :**
    - Une fois que les conteneurs Docker sont démarrés, accédez au conteneur PHP pour installer les dépendances du projet :
    ```bash
    docker-compose exec -it php bash
    composer install
    ```

3. **Configurer la base de données MySQL:**

   - Créez la base de données et appliquez les migrations :
       ```bash
       php bin/console doctrine:database:create
       php bin/console make:migration
       php bin/console doctrine:migrations:migrate
       ```

   - Chargez les fixtures :
       ```bash
       php bin/console doctrine:fixtures:load
       ```


## Scripts Disponibles

Dans ce projet, vous pouvez exécuter les scripts suivants :

- `composer install` : Installe les dépendances PHP dans le conteneur Docker.
- `docker-compose --env-file .env.local up --build -d` : Démarre tous les services Docker nécessaires pour exécuter l'application.
- `docker-composer down` : Arrête et supprime les conteneurs
