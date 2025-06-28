#!/bin/bash


mkdir -p storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

php artisan config:cache
php artisan migrate --force || true

/usr/bin/supervisord -c /etc/supervisord.conf