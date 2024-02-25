FROM php:8.3

RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
        unzip \
        git \
        npm \
        libicu-dev \
        g++ \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        zip \
        intl

RUN docker-php-ext-install opcache \
    && pecl install apcu \
    && docker-php-ext-enable apcu

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définition du répertoire de travail
WORKDIR /var/www

COPY ./composer.json ./composer.lock ./

# Installation des dépendances PHP
RUN composer install --no-scripts --no-autoloader

COPY ./package.json ./package-lock.json ./

# Installation des dépendances NPM
RUN npm install

# Copie des sources
COPY . .

# Gestion des droits sur storage et bootstrap/cache que pour le dev on peut se permettre le chmod 777
RUN chmod -R 775 storage
RUN chmod -R 775 bootstrap/cache

RUN echo 'function a() { php artisan "$@"; }' >> ~/.bashrc
