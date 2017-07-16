FROM php:5.6-apache

MAINTAINER kojiro526

ENTRYPOINT /bin/bash

RUN set -x \
    && a2enmod rewrite headers \
    && apt-get update \
    && apt-get install -yqq \
       less \
       vim \
       --no-install-recommends

# Install mbstring
RUN docker-php-ext-install mbstring

# Install mcrypt
RUN apt-get install -y libmcrypt-dev
RUN docker-php-ext-install mcrypt

# Install intl
RUN apt-get install -y libicu-dev
RUN pecl install intl
RUN docker-php-ext-install intl

# Install PDO
RUN docker-php-ext-install pdo_mysql

RUN chown -R www-data:www-data /var/www/html

ENTRYPOINT /etc/init.d/apache2 start && /bin/bash
