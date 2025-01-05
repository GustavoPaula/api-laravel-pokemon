#!/bin/sh

# Rodar as migrations
php artisan migrate

# Executar o horizon
php artisan horizon