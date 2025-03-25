FROM php:8.2-fpm-alpine

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

WORKDIR /app

RUN apk update && apk upgrade

RUN chmod +x /usr/local/bin/install-php-extensions

RUN install-php-extensions memcached
RUN install-php-extensions mysqli
RUN install-php-extensions pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

RUN addgroup -g 1000 app && adduser -u 1000 -G app -s /bin/sh -D app

USER app
