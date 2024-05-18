FROM php:latest

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer create-project --prefer-dist laravel/laravel=10.* .

EXPOSE 9000
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]