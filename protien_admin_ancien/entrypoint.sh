#!/bin/bash
set -e

# Install deps if missing
if [ ! -f "/var/www/html/vendor/autoload.php" ]; then
    echo "Installing Composer dependencies..."
    composer install --no-dev --optimize-autoloader --no-scripts --no-interaction
fi

# Generate APP_KEY if missing/empty/invalid
if [ ! -f "/var/www/html/.env" ] || ! grep -q '^APP_KEY=base64:' /var/www/html/.env; then
    echo "Generating application key..."
    cp /var/www/html/.env.example /var/www/html/.env 2>/dev/null || touch /var/www/html/.env
    php artisan key:generate --no-interaction --force
fi

# Set permissions
chmod -R 755 storage bootstrap/cache 2>/dev/null || true
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

exec "$@"