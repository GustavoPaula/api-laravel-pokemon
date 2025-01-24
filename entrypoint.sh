#!/bin/sh

# Instalar as dependências do Node
npm install

# Instalar dependências do Laravel
composer install
php artisan storage:link
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan horizon &

# Iniciar o PHP-FPM
php-fpm