FROM php:7.4-apache
RUN docker-php-ext-install mysqli && \
 a2enmod rewrite && \
 service apache2 restart  \
docker-php-ext-install zip



RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
