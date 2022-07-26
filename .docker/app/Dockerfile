FROM php:8.1.8-fpm

RUN docker-php-ext-install bcmath pdo_mysql

RUN apt-get update
RUN apt-get install -y git zip unzip

# RUN chown -R www-data:www-data /var/www
# RUN chmod -R 777 /var/www

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

EXPOSE 9000
