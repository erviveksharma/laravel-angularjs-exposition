# Laravel AngularJs Boilerplate
The boilerplate application built with Laravel as backend and AngularJS as Frontend. It is a ready-to-use "starting pack" that you can use to build your first API in seconds. As you can easily imagine, it is built on top of the awesome Laravel Framework. And the front end powered by AngularJS

The application is developed with foundation of follwing work
https://github.com/francescomalatesta/laravel-api-boilerplate-angular-example

It also benefits from three pacakages:

* JWT-Auth - [tymondesigns/jwt-auth](https://github.com/tymondesigns/jwt-auth)
* Dingo API - [dingo/api](https://github.com/dingo/api)
* Laravel-CORS [barryvdh/laravel-cors](http://github.com/barryvdh/laravel-cors)

## Installation

```bash
$ git clone https://github.com/erviveksharma/laravel-angularjs-exposition.git
$ cd laravel-angularjs-exposition
$ composer update
$ php -r "copy('.env.example','.env);"
$ php -r key:generate
$ php artisan jwt:generate
$ php artisan migrate
```

## Usage

Please follow these articles for more help Sitepoint:

* [How to Build an API-Only JWT-Powered Laravel App](https://www.sitepoint.com/how-to-build-an-api-only-jwt-powered-laravel-app/)
* [How to Consume Laravel API with AngularJS](https://www.sitepoint.com/how-to-consume-laravel-api-with-angularjs/)

