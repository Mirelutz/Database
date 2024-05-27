FROM php:8.2-apache

RUN apt-get update -y && \
    apt-get install -y openssl libssl-dev libcurl4-openssl-dev

RUN pecl install -f mongodb && \
    docker-php-ext-enable mongodb

RUN echo "extension=pmongodb" >> /usr/local/etc/php/php.ini
RUN echo "extension=libmongoc" >> /usr/local/etc/php/php.ini

EXPOSE 80
