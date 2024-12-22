# Usando a imagem base do PHP com FPM
FROM php:8.3-fpm

# Instalar pacotes necessários no Debian (imagem base do PHP)
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip git unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && apt-get clean

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar os arquivos do projeto Laravel para dentro do contêiner
COPY . .

# Ajustar permissões para os diretórios de storage e cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expor as portas necessárias
EXPOSE 9000
EXPOSE 8000

# Copiar o script de inicialização
COPY start.sh /start.sh

RUN chmod +x /start.sh

# Script para rodar PHP-FPM e Laravel simultaneamente
CMD ["/start.sh"]
