FROM php:fpm-alpine
RUN apk update && apk add --no-cache \
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version