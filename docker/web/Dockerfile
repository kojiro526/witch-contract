FROM php:7.2-apache

LABEL maintainer "kojiro526 <kojiro@ryusei-sha.com>"

RUN set -x \
    && a2enmod rewrite headers \
    && apt-get update \
    && apt-get install -yqq \
       less \
       vim \
       unzip \
       libmcrypt-dev \
       libicu-dev \
       --no-install-recommends

RUN  docker-php-ext-install -j$(nproc) intl \
     && docker-php-ext-install -j$(nproc) pdo_mysql

RUN  chown -R www-data:www-data /var/www/html

# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/bin \
    && php -r "unlink('composer-setup.php');"

ENTRYPOINT /etc/init.d/apache2 start && /bin/bash
