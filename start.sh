#!/bin/bash

# Executa as migrações do Laravel
php artisan migrate

# Instala o Breeze
php artisan breeze:install blade

# Inicia o npm em modo aberto a todos os hosts
npm run dev -- --host &

# Inicia o servidor PHP-FPM
php-fpm
