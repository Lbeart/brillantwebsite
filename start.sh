#!/bin/sh

# Clear & cache configs
php artisan config:clear
php artisan config:cache

# Migrate DB (won't fail pipeline if fails)
php artisan migrate --force || true

# Start Supervisor
/usr/bin/supervisord -c /etc/supervisord.conf
