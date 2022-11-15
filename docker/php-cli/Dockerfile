FROM php:8.1.0-cli

RUN apt update && apt -y install unzip git

RUN curl -sSLf \
        -o /usr/local/bin/install-php-extensions \
        https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions

RUN install-php-extensions pdo_pgsql xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --queit

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR '/app/symfony'