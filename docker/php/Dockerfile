# Use PHP 8.2 FPM as base image
FROM php:8.2-fpm

# Install extensions
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql zip gd \
    && pecl install redis \
    && docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

# Copy composer if needed
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer