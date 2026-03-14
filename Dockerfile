FROM composer:2 as builder

WORKDIR /app

# Copiar solo lo necesario para instalar dependencias
COPY composer.json composer.lock ./

# Instalar dependencias sin las de dev
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist
# Usar la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

COPY --from=builder /app/vendor ./vendor
COPY --from=builder /usr/bin/composer /usr/bin/composer