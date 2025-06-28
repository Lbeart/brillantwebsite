# ─────────────────────────────────────────────── 
# STAGE 1: Composer dependencies (build_vendor)
# ───────────────────────────────────────────────
FROM php:8.2-cli AS build_vendor

RUN apt-get update && apt-get install -y --no-install-recommends \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libpng-dev \
    libxml2-dev \
    libonig-dev \
    && docker-php-ext-install zip pdo_mysql mbstring bcmath gd xml \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction

# ───────────────────────────────────────────────
# STAGE 2: Final image with PHP-FPM and Alpine
# ───────────────────────────────────────────────
FROM php:8.2-fpm-alpine

RUN apk update && apk add --no-cache \
    nginx \
    supervisor \
    libzip-dev \
    libpng-dev \
    libxml2-dev \
    unzip \
    git \
    curl \
    oniguruma-dev

RUN docker-php-ext-install pdo_mysql mbstring bcmath gd zip xml

WORKDIR /var/www

# Copy app code and vendor dependencies from previous stage
COPY . .
COPY --from=build_vendor /usr/bin/composer /usr/bin/composer
COPY --from=build_vendor /app/vendor ./vendor

# Fix permissions for Laravel
RUN mkdir -p storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Copy server configs
COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisord.conf
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Ensure all files are owned correctly
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

EXPOSE 8080
CMD ["/bin/sh", "/start.sh"]
