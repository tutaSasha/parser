<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Парсинг Сайтов(по ТЗ)

Установка:

- git clone https://github.com/tutaSasha/parser.git
- php artisan migrate
- php artisan queue:work
- php artisan parse:run {url} {depth?} {MaxCountPage?}

url - http://example.site || https://example.site

depth - integer

MaxCountPage - integer

Для просмотра результатов парсинга 
запустите команду
- php artisan serve

Перейдите по ссылке
http://localhost:8000/



TODO
Добавить вывод сводных данных
- среднее время загрузки странички 
- количество спарсеных страничек
- среднее количество изображение на страничках
