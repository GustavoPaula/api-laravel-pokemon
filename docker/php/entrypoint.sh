#!/bin/bash

# Executa as migrações do banco de dados
echo "Running migrations..."
php artisan migrate --force || exit 1

# Inicia o Horizon em background e redireciona os logs
echo "Starting Horizon..."
php artisan horizon > /var/log/horizon.log 2>&1 &

# Executa o comando principal do contêiner (por exemplo, php-fpm)
echo "Starting main container process..."
exec "$@"
