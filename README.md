# HNGx Task 2 - Person API

Below is a description on how to run this project locally on your machine

## Setup

-   clone this repository into a folder
-   changed directory (cd) into cloned folder
-   run `composer install` to download dependencies
-   connect to any MySQL database and create a database
-   add database credentials to environment variables (including created DB)
-   run `php artisan migrate` to run migrations (creates necessary tables in database)
-   run `php artisan serve` to start a local server

## How to run

Access the API via the following endpoints and methods
|Method|Endpoint|Description
|-|-|-|
|POST|url/api|Create data for Person with json data e.g `{"name":"xxx"}`|
|GET|url/api|List all Persons|
|GET|url/api/x|Read data for Person with ID or Name 'x'|
|PUT|url/api/x|Update data for Person with ID or Name 'x' with json data e.g `{"name":"new xxx"}`|
|DELETE|url/api/x|Delete data for Person with ID or Name 'x'|

## Documentation

Kindly view this resource [DOCUMENTATION.md](DOCUMENTATION.md) for more info on request & respose samples.

## Live URL: [https://hngx-task2-5bd62a47075a.herokuapp.com/api](https://hngx-task2-5bd62a47075a.herokuapp.com/api)
