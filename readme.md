# Ulos Zone

## Prerequisite
- PHP 7.2
- Composer
- Maria DB

## Installation
- Clone this project
- Run `composer install` to download all dependencies
- Copy .env.example to .env
- Run `php artisan key:generate` to generate APP_KEY in .env file

## Migration
- Run `php artisan migrate` to generate the database schema

## Run
- Run `php artisan serve`