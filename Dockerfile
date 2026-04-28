FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip libicu-dev libzip-dev \
    && docker-php-ext-install intl pdo_mysql zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY apache.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

CMD bash -lc "composer install --no-interaction --prefer-dist && chown -R www-data:www-data /var/www/html/tmp /var/www/html/logs && apache2-foreground"
