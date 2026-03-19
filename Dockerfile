FROM php:8.4-apache
COPY proyecto/ /var/www/html/
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod ssl
RUN a2ensite default-ssl

COPY certs/cert.pem /etc/ssl/certs/cert.pem
COPY certs/privkey.pem /etc/ssl/private/privkey.pem

EXPOSE 80
EXPOSE 443
