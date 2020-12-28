FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        mariadb-client \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libwebp-dev \
        libicu-dev \
    && docker-php-ext-install -j$(nproc) pdo_mysql intl pcntl \
    && docker-php-ext-configure gd --with-freetype --with-webp --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN chown -R www-data:www-data /var/www

WORKDIR /var/www
