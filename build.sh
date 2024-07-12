#!/bin/bash

# Default build commands
echo "Running default build commands..."
npm install
npm run build

# Laravel specific commands
echo "Running Laravel migrations and seeds..."
php artisan migrate:fresh --seed

# Additional commands
