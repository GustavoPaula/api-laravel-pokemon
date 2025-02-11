FROM php:8.3-fpm

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
WORKDIR /app

# Copiar todos os arquivos para dentro do container
COPY . .

# Ajustar permissões para os diretórios de storage e cache
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

ENTRYPOINT [ "./entrypoint.sh" ]

# Expor as portas necessárias
EXPOSE 9000
