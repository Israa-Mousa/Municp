#!/bin/sh
set -eu

port="${PORT:-10000}"
sed -i "s/Listen 80/Listen ${port}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${port}>/" /etc/apache2/sites-available/000-default.conf

if ! php artisan migrate --force; then
    printf '%s\n' 'Database migrations failed; refusing to start Apache.' >&2
    exit 1
fi

if ! php artisan storage:link --force; then
    printf '%s\n' 'Creating the public storage link failed; refusing to start Apache.' >&2
    exit 1
fi

exec "$@"
