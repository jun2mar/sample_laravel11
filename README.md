# Sample Laravel 11

## Its a simple setup of laravel 11 that has the API for:
- Login
- Registration
- Retrieval of users information

## The project is built with:
- Sanctum for API authentication

## Setup
- Create env file, use the config setup found in env.example
- Setup Mysql Database connection and run the following
  - php artisan config:clear
  - php artisan cache:clear
  - php artisan migrate
