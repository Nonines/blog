#!/usr/bin/env bash
echo "Running composer"
cp /etc/secrets/.env .env
composer global require hirak/prestissimo
composer install --working-dir=/var/www/html

# echo "generating application key..."
# php artisan key:generate --show

echo "Clearing caches..."
php artisan optimize:clear

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching events..."
php artisan event:cache

echo "Caching views..."
php artisan view:cache

echo "Running migrations..."
php artisan migrate:fresh --force --seed

echo "done deploying"
