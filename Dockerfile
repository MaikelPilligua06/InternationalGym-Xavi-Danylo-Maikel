FROM php:8.4-apache
COPY proyecto/ /var/www/html/
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod ssl
RUN a2ensite default-ssl
RUN a2ensite 000-default
RUN chown -R :www-data /var/www/html 
RUN chmod -R 755 /var/www/html
RUN chgrp -R www-data /var/www/html
COPY certs/cert.pem /etc/ssl/certs/cert.pem
COPY certs/privkey.pem /etc/ssl/private/privkey.pem
COPY apache/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80
EXPOSE 443

ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]
