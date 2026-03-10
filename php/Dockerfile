FROM php:8.5-apache

# Installation des outils de compression (indispensable pour Composer)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

# INSTALLATION DE COMPOSER
# On récupère le fichier binaire de l'image officielle et on le place dans /usr/bin/
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html