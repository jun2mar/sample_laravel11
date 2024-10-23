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
  ```sh
  php artisan config:clear
  ```
  ```sh
  php artisan cache:clear
  ```
  ```sh
  php artisan migrate
  ```
  
## There is a UserSeeder that can be use just run:
  ```sh
  php artisan db:seed --class=UserSeeder
  ```
After running the seeder there is a default account that you can use:
Username: admin@example.com
Password: 12345
