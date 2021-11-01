FROM php:7.4-apache
RUN docker-php-ext-install mysqli && \
 a2enmod rewrite && \
 service apache2 restart && chmod o=rx /var/www/html