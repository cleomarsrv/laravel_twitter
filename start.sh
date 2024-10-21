#!/bin/bash

# permissoes corretas para o nginx
chown -R www-data:www-data /var/www/storage
chmod -R 775 /var/www/storage

cd /var/www

# Instalar o Composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer
wait

# Instalar dependências do PHP via Composer
composer install --prefer-dist --no-interaction --optimize-autoloader
wait

# Executa as migrações do Laravel
php artisan migrate --force

# povoar o banco de dados com usuarios, tweets, comentarios  e funcao Seguir
php artisan db:seed

# Inicia o servidor PHP-FPM
php-fpm
