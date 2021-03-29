## Laravel Boilerplate (Current: Laravel 8)

_Laravel Boilerplate_  

## Table of Contents

- [Features](#features)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Run](#run)
- [How to Contribute](#how-to-contribute)
- [Issues](#issues)
- [License](#license)

## Features

- Administration Dashboard with [AdminLTE](https://adminlte.io/)
- Responsive Layout
- Font Awesome and SweetAlert2

## System Requirements

- PHP >= 7.3.x
- Composer >= 1.9.x

## Installation

1. Clone repository
```
$ git clone https://github.com/edwincarnese/laravel-boilerplate.git
```
2. Change into working directory
```
$ cd laravel-boilerplate
```
3. Copy .env.example to .env and modify according to your environment
```
$ cp .env.example .env
```
4. Install composer dependencies
```
$ composer install
```
5. An application key can be generated with the command
```
$ php artisan key:generate
```
6. Run these commands to create the tables within the defined database and populate seed data
```
php artisan migrate --seed
```

## Run
To start the PHP built-in server
```
$ php artisan serve --port=8080
or
$ php -S localhost:8080 -t public/
```
Now you can browse the site at [http://localhost:8080](http://localhost:8080)

## How to Contribute

Please free to make any pull requests, or e-mail me a feature request you would like to see in the future to Edwin Carnese at (edwincarnese@gmail.com).

## Issues

If you come across any issues please report in [Github Issues](https://github.com/edwincarnese/laravel-boilerplate/issues).

## License

This Laravel boilerplate is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
