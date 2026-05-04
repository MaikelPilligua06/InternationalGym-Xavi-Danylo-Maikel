#!/bin/bash
set -e

echo "Esperando a MySQL..."
until php -r "new PDO('mysql:host=mysql;dbname=InternationalGym', 'intgym', '1234');" 2>/dev/null; do
  sleep 2
done
echo "MySQL listo."

chown -R www-data:www-data /var/www/html/views/gymFotos
chmod -R 775 /var/www/html/views/gymFotos   

php /var/www/html/scripts/entrenador.php
php /var/www/html/scripts/usuario.php

exec "$@"
