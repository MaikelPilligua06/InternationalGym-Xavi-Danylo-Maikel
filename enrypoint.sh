#!/bin/bash
set -e
chown -R www-data:www-data /var/www/html/views/gymFotos
chmod -R 775 /var/www/html/views/gymFotos

exec "$@"


