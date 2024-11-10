FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y git libicu-dev zip libzip-dev libssl-dev\
    && docker-php-ext-install opcache pdo pdo_mysql intl \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

RUN a2enmod rewrite

WORKDIR /var/www

RUN curl -sSk https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
curl -sSf https://get.symfony.com/cli/installer | bash -s -- --install-dir=/usr/local/bin/symfony \
curl -s https://cli-assets.heroku.com/install.sh | sh
