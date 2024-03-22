#!/bin/bash

echo "Starting start.sh script..."

# Wait for the database server to be ready
while ! nc -z db 3306; do   
  sleep 1
done

echo "Database server is ready."

# Run the migration
php artisan migrate

echo "Migration completed."

# Start the Laravel server
php-fpm

echo "Laravel server started."
