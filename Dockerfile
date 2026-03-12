FROM php:8.4-apache
COPY proyecto/ /var/www/html/
RUN docker-php-ext-install mysqli pdo pdo_mysql
EXPOSE 80
