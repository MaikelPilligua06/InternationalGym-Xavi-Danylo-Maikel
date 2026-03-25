FROM php:8.4-apache

COPY proyecto/ /var/www/html/

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod ssl
RUN a2ensite default-ssl
RUN a2ensite 000-default


COPY certs/cert.pem /etc/ssl/certs/cert.pem
COPY certs/privkey.pem /etc/ssl/private/privkey.pem
COPY apache/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf

EXPOSE 80
EXPOSE 443
