FROM php:8.1-fpm

RUN apt update && apt -y install unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --queit

ENV COMPOSER_ALLOW_SUPERUSER 1