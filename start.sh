#!/bin/sh

# Set permissions again in case container reset them
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Laravel optimizations
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force || true

# Start Supervisor to keep services running
/usr/bin/supervisord -c /etc/supervisord.conf