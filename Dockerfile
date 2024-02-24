FROM php:8.2-apache

ARG USER_ID
ARG GROUP_ID

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN apt-get update
RUN apt-get install -y --no-install-recommends
RUN apt-get install -y locales apt-utils libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev unzip
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen
RUN echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen
RUN locale-gen
RUN curl -sS https://getcomposer.org/installer | php --
RUN mv composer.phar /usr/local/bin/composer
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql opcache intl zip calendar dom mbstring exif gd xsl
RUN pecl install apcu && docker-php-ext-enable apcu
WORKDIR /var/www
COPY storage .
COPY bootstrap .
RUN chown -R www-data:www-data storage bootstrap/cache

RUN usermod -u ${USER_ID:-1000} www-data
RUN groupmod -g ${GROUP_ID:-1000} www-data

USER www-data
