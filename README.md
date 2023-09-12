# HNGx Task 2 - Person API

Below is a description on how to run this project locally on your machine

## Setup (local)

-   clone this repository into a folder
-   changed directory (cd) into cloned folder
-   run `composer install` to download dependencies
-   connect to any MySQL database and create a database
-   copy the contents of .env.example file to .env (create it if it doesn't exist)
-   add/update the following database credentials to environment variables (including created DB)
    -   DB_CONNECTION=mysql
    -   DB_HOST=db_host
    -   DB_PORT=3306
    -   DB_DATABASE=db_name
    -   DB_USERNAME=db_user
    -   DB_PASSWORD=db_user
-   run the following commands respectively
    -   `php artisan key:generate` - generates an app key
    -   `php artisan migrate` to run migrations (creates necessary tables in database)
    -   `php artisan serve` to run your app on a local php server

## How to run

Access the API via the following endpoints and methods
|Method|Endpoint|Description
|-|-|-|
|POST|url/api|Create data for Person with json data e.g `{"name":"xxx"}`|
|GET|url/api|List all Persons|
|GET|url/api/x|Read data for Person with ID or Name 'x'|
|PUT|url/api/x|Update data for Person with ID or Name 'x' with json data e.g `{"name":"new xxx"}`|
|DELETE|url/api/x|Delete data for Person with ID or Name 'x'|

## Tesing

run the command `php artisan test` to run test file located in [PersonEndpointTest.php](./tests/Feature/PersonEndpointTest.php) file

## Documentation

Kindly view the [DOCUMENTATION.md](DOCUMENTATION.md) file for more information on request & respose samples and usages.

## Live URL: [https://hngx-task2-5bd62a47075a.herokuapp.com/api](https://hngx-task2-5bd62a47075a.herokuapp.com/api)
