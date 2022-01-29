# Pubsher

A social blogging system. Almost a clone of Dev.to website

## Requirements

-   php 8.0+

## Installing

-   Clone this repo
-   Navigate to the project's root directory.
-   Rename .env.example to .env
-   Create a database called 'pubsher'
-   Run `composer install` to install PHP dependencies.
-   Run `php artisan migrate --seed` migrate and seed the database tables;
-   Run `npm install` to install front-end dependencies.
-   Run `npm run dev` to generate front-end assets **or** (`npm run hot`) to watch and auto-reload changes .
-   Run `php artisan serve`
