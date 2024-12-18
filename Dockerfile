FROM php:8.3.13-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && docker-php-ext-install mcrypt pdo_mysql redisgi

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#definir diretorio de trabalho
WORKDIR /app

#copiar os arquivos do projeto laravel para dentro do container
copy . .

#instalar dependencias do laravel via commposer
RUN composer Install

#Ajustar permissoes para os diretorios de storage e cache
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache

#expor a porta 9000
EXPOSE 9000

#Comando para rodar o php-fmp
CMD ['php-fmp']
