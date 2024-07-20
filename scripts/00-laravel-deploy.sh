#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "generating application key..."
php artisan key:generate --show

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
