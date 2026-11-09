#!/bin/sh
set -eu

port="${PORT:-10000}"
sed -i "s/Listen 80/Listen ${port}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${port}>/" /etc/apache2/sites-available/000-default.conf

php artisan config:clear

if [ -z "${APP_KEY:-}" ]; then
    printf '%s\n' 'APP_KEY is missing; generating a temporary key. Set APP_KEY in Render for a stable key across restarts.' >&2
    APP_KEY="$(php artisan key:generate --show --no-ansi)"
    export APP_KEY
fi

if ! php -r 'require "vendor/autoload.php"; $key = getenv("APP_KEY") ?: ""; if (strncmp($key, "base64:", 7) === 0) { $decoded = base64_decode(substr($key, 7), true); $key = $decoded === false ? "" : $decoded; } exit(\Illuminate\Encryption\Encrypter::supported($key, "AES-256-CBC") ? 0 : 1);'; then
    printf '%s\n' 'APP_KEY must contain a valid 32-byte key for AES-256-CBC.' >&2
    exit 1
fi

php artisan config:cache
php artisan route:cache
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link --force

exec "$@"
