<!-- Allocin : Développement d'une application web de gestion de films -->

## 1. Création de l'environnement de travail
- Docker
- Structure MVC
- GitHub

## 2. Création de la base de données
- conception du schéma
- saisie des données

## 3. Création des classes PHP
- 'final class Database' pour la connexion PDO
- classes de base pour les models
- mise en place du composer avec autoload
- structure en place jour 1 :

allocine
│
├── docker-compose.yml
├── composer.json
├── vendor/
│
├── mysql/init/
│     01_schema.sql
│
├── php/
│     Dockerfile
│
├── public/
│     index.php
│     assets/
│
└── src/
      Core/
          Database.php
          Router.php
      Controllers/

      Models/
          Film.php
          Genre.php
          User.php
      Views/
          Auth/
          Films/
            index.php
          Layout/
            header.php
        

## 4. Architecture globale & sécurité
- finalistion de la structure MVC
- Mise en place du router / chemins
- Traitement des sessions : inscription, connexion
- Sécurité : password_hash(), password_verify(), CSRF avec un token