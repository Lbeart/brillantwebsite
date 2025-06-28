#!/bin/sh

# Krijo storage nëse mungon
mkdir -p /var/www/storage/logs /var/www/bootstrap/cache

# Jep leje të plota për userin www-data
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Ekzekuto komandat si www-data
su www-data -s /bin/sh -c "php artisan config:cache"
su www-data -s /bin/sh -c "php artisan migrate --force || true"

# Nise supervisord si www-data
exec su www-data -s /bin/sh -c "/usr/bin/supervisord -c /etc/supervisord.conf"