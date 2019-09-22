FROM php:fpm-alpine

COPY composer.* ./
RUN composer install --no-autoloader
COPY . ./
RUN composer dump-autoload