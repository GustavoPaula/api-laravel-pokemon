#!/bin/sh

# Iniciar o PHP-FPM em segundo plano
php-fpm &

# Iniciar o servidor Laravel
php artisan serve --host=0.0.0.0 --port=8000
