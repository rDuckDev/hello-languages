# Laravel App

## Installation

* Install and configure XAMPP, Composer, and Laravel
* Create a `database\database.sqlite` file
* Copy the `.env.example` file to `.env`
  * Configure the DB for SQLite
    ```conf
    DB_CONNECTION=sqlite
    ```
* Run the following commands from the project root
  ```bat
  REM install dependencies
  composer install
  npm install
  REM create an application key
  php artisan key:generate
  REM migrate the database
  php artisan migrate
  REM configure runtime storage
  php artisan storage:link
  ```

## Usage

* Run the following command
  ```bat
  REM build CSS/JS files
  npm run development
  REM start the server
  php artisan serve
  ```
* Open a browser to [localhost:8000](http://localhost:8000/)
