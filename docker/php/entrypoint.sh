#!/bin/bash

set -e  # Interrompe o script se qualquer comando falhar

# Executar comandos do Laravel
php artisan storage:link
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# Iniciar o Horizon em background e redirecionar os logs
php artisan horizon > /var/log/horizon.log 2>&1 &

# Iniciar o PHP-FPM em segundo plano
php-fpm &

# Iniciar o Nginx como processo principal
nginx -g "daemon off;" # daemon off mantem o container ativo
