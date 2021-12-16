# PHP

## Installation

- Download and install [XAMPP]( https://www.apachefriends.org/download.html )
  - Only install Apache and PHP
  - Install XAMPP to `C:\xampp`

## Configuration

- Run the following command
  ```cmd
  mklink /J C:\xampp\htdocs\php %THREE_APPS_PATH%\php
  ```
- Open the XAMPP Control Panel
  - Edit the `php.ini` config file
  - Uncomment the following lines
    ```ini
    extension=pdo_sqlite
    extension=sqlite3
    ```
  - Start the Apache module

## Usage

- Open a web browser to [http://localhost/php]( http://localhost:80/php )
- Navigate to the desired sub-project
