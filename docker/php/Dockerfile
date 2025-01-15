FROM php:8.4-fpm

# Instalar pacotes necessários
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip git unzip nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pcntl pdo_mysql \
    && apt-get clean

RUN pecl install --onlyreqdeps --force redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# Buscar a última versão do composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar o node e o npm
RUN apt install nodejs npm -y

# Definir o diretório do app
WORKDIR /var/www

# Copiar todos os arquivos para dentro do container
COPY . .

# Ajustar permissões para os diretórios de storage e cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expor as portas necessárias
EXPOSE 9000

# Usar entrypoint.sh como ENTRYPOINT
COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# O CMD deve iniciar o processo principal (php-fpm ou supervisord)
CMD ["php-fpm"]
