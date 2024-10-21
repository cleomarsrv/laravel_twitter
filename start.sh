#!/bin/bash

# Executa as migrações do Laravel
php artisan migrate

# povoar o banco de dados com usuarios, tweets, comentarios  e funcao Seguir
php artisan db:seed

# Inicia o npm em modo aberto a todos os hosts
npm run dev -- --host &

# Inicia o servidor PHP-FPM
php-fpm


