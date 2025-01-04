#!/bin/sh

# Iniciando o webserver
nginx

# Rodar as migrations
php artisan migrate

# Iniciando o PHP FPM
php-fpm