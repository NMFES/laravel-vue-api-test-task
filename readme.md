# Laravel 5.5 / Vue 2 / Bootstrap test task

What's included
- Search form with inputs
- Displaying found items in table

## Installation

For installing you should run next commands:

* `git clone https://github.com/NMFES/laravel-vue-api-test-task.git`
* `cd laravel-vue-api-test-task`
* `composer install`
* `npm install`
* `php artisan key:generate`
* Edit .env and set your database connection params. Also you need to change charset=utf8 and collation=utf8_general_ci in config/database.php
* `php artisan migrate`
* `php artisan db:seed` if you want to seed database with data

... and something else you need to do. If i forgot something :)

## Usage

``` bash
# build and watch
npm run watch (or "npm run watch-poll")

# build for production
npm run prod
```
<img src="https://raw.githubusercontent.com/NMFES/laravel-vue-api-test-task/master/storage/app/other/1.png" height="500" align="left">
