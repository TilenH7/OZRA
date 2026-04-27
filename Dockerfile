FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    libpng-dev \
    libxml2-dev \
    libicu-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql intl mbstring gd zip \
    && a2enmod rewrite

COPY apache.conf /etc/apache2/sites-available/000-default.conf
