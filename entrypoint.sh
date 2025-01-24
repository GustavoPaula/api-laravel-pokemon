#!/bin/sh

# Iniciar Nginx
nginx

php artisan storage:link
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# Iniciar o PHP-FPM
php-fpm