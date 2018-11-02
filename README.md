![SistemaEleitoral](https://github.com/fabriciodsr/phpchallenge/raw/master/src/public/images/PHPChallengeS2IT.png)

# PHPChallenge
XML upload and process, letting information available via rest APIs.

## Features

* Docker with MySQL, PHP, PHPMyAdmin and Nginx images
* Laravel 5.7 with REST APIs
* Doctrine as ORM
* Repository Pattern
* Laravel API Documentation Generator as API Documentation
* PHPUnit as UnityTest tool

## Installation

### Docker

To use this project you first need Docker installed.
Downloads:

* MacOS: https://www.docker.com/docker-mac
* Windows: https://www.docker.com/docker-windows
* Other: https://www.docker.com/get-docker

Once Docker is installed you should be able to run the following from command line (terminal / cmd / powershell):  `docker -v`.

### Composer

Do you have "composer" installed? If you don't have, just check `https://getcomposer.org/doc/` to install.

### Git

First of all, clone the repository:
```
git clone https://github.com/fabriciodsr/phpchallenge.git YOURFOLDERNAME
cd YOURFOLDERNAME
```

## Project Folder Structure

* docker-compose.yml -- Docker configuration file
* config/site.conf -- Nginx configuration file
* config/mysql.env -- Environment configuration file for MySQL
* src/ -- Laravel application
* docker/app -- Dockerfile to add the PDO drivers to PHP-FPM


### Setting up the application

Let's go to Docker, type the following command: 
```
docker-compose up -d
```

This command will generate these containers:

* nginx - HTTP server
* app - Laravel App
* db - MySQL
* phpmyadmin - Web interface for database.


Go to your **src** folder and execute to prepare the Laravel application
```
cd src
composer install
cd ..
```

### Generating the database schema with Doctrine

First move to **src** folder.
Execute the following command to list the containers:
```
docker ps
```

Get the name of the container which contains "app", like `myapp_app_1` and execute:
```
docker exec -ti myapp_app_1 /bin/sh
```

Now you can use the **php artisan** with the following command to generate de database:
```
php artisan doctrine:schema:create
```

## URLs

URLs available for the project:

* http://localhost/ -- The application to upload and process XML.
* http://localhost/Manage -- The panel to manage your authentication details and keys.
* http://localhost/api/docs -- The API Documentation.
* http://localhost:8080/ -- The PHPMyAdmin interface for your database (username: root, password: root)


## Credentials and Environment info

* MySQL

Defined at: **config/mysql.env**
```
database: PHPChallenge
username: root
password: root
```

* Laravel

Defined at: **src/.env**
```
DB_HOST=db (CAUTION: Don't change, it references to Docker **db container**)
DB_PORT=3306
DB_DATABASE=PHPChallenge
DB_USERNAME=root
DB_PASSWORD=root
```

## Running PHPUnit Tests

First move to **src** folder.
Execute the following command to list the containers:
```
docker ps
```

Get the name of the container which contains "app", like `myapp_app_1` and execute:
```
docker exec -ti myapp_app_1 /bin/sh
```

Now you can use the following command to run **ALL** tests:
```
./vendor/bin/phpunit
```

Run specific test:
```
./vendor/bin/phpunit tests/Unit/TESTNAME
```
