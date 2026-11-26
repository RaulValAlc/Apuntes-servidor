ARG DEBIAN_FRONTEND=noninteractive
FROM php:8.5.13-apache

RUN echo "<Directory /var/www/html>" >>/etc/apache2/sites-available/000-default.conf
RUN echo "Options Indexes FollowSymLinks" >>/etc/apache2/sites-available/000-default.conf
RUN echo "AllowOverride All" >>/etc/apache2/sites-available/000-default.conf
RUN echo "</Directory>" >>/etc/apache2/sites-available/000-default.conf

RUN apt update
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN apt-get update \
&& apt-get install -y libzip-dev \
&& docker-php-ext-install zip

RUN a2enmod rewrite

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

VOLUME /var/www/html
WORKDIR /var/www/html
EXPOSE 80