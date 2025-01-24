FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip git unzip nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pcntl pdo_mysql \
    && apt-get clean

RUN pecl install --onlyreqdeps --force redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt install nodejs npm -y

WORKDIR /app

COPY . .

RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

ENTRYPOINT ["./entrypoint.sh"]

EXPOSE 9000