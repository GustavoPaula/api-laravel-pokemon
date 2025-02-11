#!/bin/sh

# Iniciar Nginx
nginx

npm install

composer install

php artisan key:generate

php artisan storage:link
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
# Executar o horizon
php artisan horizon &

# Iniciar o PHP-FPM
php-fpm
