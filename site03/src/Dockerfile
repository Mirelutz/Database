FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libxml2-dev \
    xsltproc \
    xmlstarlet \
    && docker-php-ext-install xml

COPY . /var/www/html/

EXPOSE 80



