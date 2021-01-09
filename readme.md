##Requirements

Composer version: 1.9.2

##Setup .env file

First, after cloning the project from GitHub make a .env in the project. Then add necessary credentials in the .env file like database information, mail information and others.

##Composer install

Run the command to install necessary packages:
<br>
- composer install –no-cache

(Please never run composer update command)

##Run Migration

Run the command to migrate tables in the database:
<br>
- php artisan migrate

##Start project

Run the command to start serve and run the project:
<br>
- php artisan serve
