#!/usr/bin/env sh
set -e

APP_DIR="/var/www/html/just-blog"

mkdir -p "${APP_DIR}"
cd "${APP_DIR}"

if [ ! -f artisan ]; then
  echo "Laravel not found. Creating a new Laravel project..."
  composer create-project laravel/laravel . --prefer-dist
fi

if [ ! -f .env ] && [ -f .env.example ]; then
  cp .env.example .env
fi

if [ -f .env ]; then
  sed -i "s|^APP_URL=.*|APP_URL=https://just-blog.local|g" .env || true
  sed -i "s|^DB_HOST=.*|DB_HOST=mysql|g" .env || true
  sed -i "s|^DB_PORT=.*|DB_PORT=3306|g" .env || true
  sed -i "s|^DB_DATABASE=.*|DB_DATABASE=laravel|g" .env || true
  sed -i "s|^DB_USERNAME=.*|DB_USERNAME=laravel|g" .env || true
  sed -i "s|^DB_PASSWORD=.*|DB_PASSWORD=laravel|g" .env || true
  sed -i "s|^REDIS_HOST=.*|REDIS_HOST=redis|g" .env || true
  sed -i "s|^MAIL_MAILER=.*|MAIL_MAILER=smtp|g" .env || true
  sed -i "s|^MAIL_HOST=.*|MAIL_HOST=mailpit|g" .env || true
  sed -i "s|^MAIL_PORT=.*|MAIL_PORT=1025|g" .env || true
  sed -i "s|^SESSION_DRIVER=.*|SESSION_DRIVER=file|g" .env || true
  sed -i "s|^CACHE_STORE=.*|CACHE_STORE=file|g" .env || true
fi

if [ -f package.json ] && [ ! -d node_modules ]; then
  npm install
fi

if [ ! -f vendor/autoload.php ]; then
  echo "Composer dependencies are missing. Running composer install..."
  composer install
fi

php artisan key:generate --force || true

php-fpm
