FROM php:8.0-apache
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get install -y \
    git \
    && docker-php-ext-install pdo_mysql
    
RUN sed -i 's!/var/www/html!/var/www/app/public!g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# node
RUN apt-get install -y nodejs npm && npm install n -g && n 14.15.3