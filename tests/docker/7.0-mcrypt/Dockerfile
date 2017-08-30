FROM php:7.0
RUN apt-get update && apt-get install -y libmcrypt-dev && docker-php-ext-install mcrypt
RUN pecl install xdebug && docker-php-ext-enable xdebug

