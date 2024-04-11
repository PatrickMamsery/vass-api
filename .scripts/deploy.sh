#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# if already is in maintenance mode
(php artisan down) || true

# Get the current branch name
CURRENT_BRANCH=$(git rev-parse --abbrev-ref HEAD)

# Pull the latest version of the app based on the branch
if [ "$CURRENT_BRANCH" == "master" ]; then
    git pull origin master
elif [ "$CURRENT_BRANCH" == "develop" ]; then
    git pull origin develop
else
    echo "Unknown branch. Skipping deployment."
    exit 1
fi

# Install composer dependencies
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Compile npm assets
# npm run prod

# Run database migrations
php artisan migrate --force

# Exit maintenance mode
php artisan up

echo "Deployment finished!"
