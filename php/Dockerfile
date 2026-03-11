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

# Remplace directement le DocumentRoot dans la config Apache
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/public|g' \
    /etc/apache2/sites-available/000-default.conf

# Active AllowOverride pour le .htaccess
RUN sed -i 's|</VirtualHost>|<Directory /var/www/public>\n\tAllowOverride All\n\tRequire all granted\n</Directory>\n</VirtualHost>|g' \
    /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www