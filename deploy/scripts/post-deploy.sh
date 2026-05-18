#!/usr/bin/env bash
# Post-deploy tasks for cPanel split deployment (run on the server via SSH).
set -euo pipefail

APP_PATH="${1:?APP_PATH required}"
PUBLIC_PATH="${2:?PUBLIC_PATH required}"

cd "$APP_PATH"

echo "==> Ensuring writable directories"
mkdir -p storage/framework/{cache/data,sessions,views} storage/logs bootstrap/cache
chmod -R ug+rwx storage bootstrap/cache 2>/dev/null || true

echo "==> Linking public storage (split deploy)"
mkdir -p storage/app/public
PUBLIC_STORAGE="${PUBLIC_PATH}/storage"
rm -rf "$PUBLIC_STORAGE"
ln -sfn "${APP_PATH}/storage/app/public" "$PUBLIC_STORAGE"

echo "==> Running migrations"
php artisan migrate --force

echo "==> Clearing and rebuilding caches"
php artisan optimize:clear
php artisan config:cache
php artisan view:cache

# route:cache is intentionally skipped: routes/web.php contains closures
# (/set-language, /blogs-destination-cairo, etc.) which cannot be serialized.

echo "==> Post-deploy complete"
