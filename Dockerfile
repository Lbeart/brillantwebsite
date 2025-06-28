# Stage 1: Build vendor with composer
FROM composer:2 as build_vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --prefer-dist --no-interaction

# Stage 2: PHP + Nginx + Laravel
FROM php:8.2-fpm

# Install required PHP extensions & system deps
RUN apt-get update && apt-get install -y \
    nginx \
    libzip-dev unzip zip curl supervisor \
    && docker-php-ext-install pdo pdo_mysql zip

# Set working directory
WORKDIR /var/www

# Copy app files
COPY . .

# Copy vendor
COPY --from=build_vendor /app/vendor ./vendor

# Copy config files
COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisord.conf
COPY start.sh /start.sh

# Permissions (no chown — Railway s'lejon root)
RUN chmod +x /start.sh && \
    mkdir -p storage/logs bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD ["/bin/sh", "/start.sh"]
