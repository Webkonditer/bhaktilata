FROM php:7.1-fpm

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install json \
    && useradd -ms /bin/bash app \
    && usermod -a -G www-data app

USER app
