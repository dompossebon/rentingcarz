## Project description

## Goal

Create an application that contains:

     - API to consult the next European soccer matches to be held (you can choose the league of your choice) the info and documentation is given by the resource defined below,
     - Front where to view the results (the appearance does not matter, but it must be readable).
     - You must store the matches (matches) received from the API in a database, these must not be repeated.

### 🛠 Technologies

The following tools were used in building the project:

- [Laravel v7.30.4](https://laravel.com/docs/7.x)
- [PHP 7.4.3](https://www.php.net/downloads.php#v7.4.3)
- [MySql:5.7](https://www.mysql.com/)

Model Making in Linux Ubuntu 20.4

-----------------------------
## Prerequisites

- Access a local machine running Ubuntu 20.04, or a development server as a non-root user with sudo privileges.
If using a remote server, it is recommended to have an active firewall installed.

- Docker installed on your server.

- Docker Compose installed on your server.

--------------------------

## Starting

Clone the project repository:

If you use HTTPS:

git clone https://github.com/dompossebon/rentingcarz.git

-------------------------------------------------- -------

After cloning, enter the application directory:

- cd rentingcarz

- docker-compose build rentingcarz-app

- docker-compose up -d

In the project root, locate and Duplicate the .env.example file and then rename it to .env using the command:

- cp .env.example .env

-------------------------------------------------- -------

then run the commands below:

- docker-compose exec rentingcarz-app composer install

- docker-compose exec rentingcarz-app php artisan key:generate && docker-compose exec rentingcarz-app php artisan cache:clear && docker-compose exec rentingcarz-app php artisan config:clear && docker-compose exec rentingcarz-app php artisan migrate

Now put the Project to the test!
Good Enjoy!

- http://localhost:8000

-------------------------------------------------- -------

## PUTTING THE LARAVEL SERVER INTO ACTION

## Built with
Laravel - The PHP Framework for Web Craftsmen

## by Dom Possebon
## Contact dompossebon@gmail.com

:+1: ## By Possebon
