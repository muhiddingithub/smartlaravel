FROM php:8.2-fpm-alpine

# Install packages
RUN apk add --no-cache  \
    --update linux-headers \
    curl git build-base zlib-dev oniguruma-dev autoconf bash

# Postgres
RUN apk add --no-cache libpq-dev && docker-php-ext-install pdo_pgsql

RUN docker-php-ext-install mbstring

RUN apk add --no-cache \
        libjpeg-turbo-dev \
        libpng-dev \
        libwebp-dev \
        freetype-dev
# As of PHP 7.4 we don't need to add --with-png
RUN docker-php-ext-configure gd --with-jpeg --with-webp --with-freetype
RUN docker-php-ext-install gd

WORKDIR /var/www

COPY .env.example .env

EXPOSE 9000

CMD ["php-fpm"]
