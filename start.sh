#!/bin/bash

# permissoes corretas para o nginx
RUN chown -R www-data:www-data /var/www/storage
RUN chmod -R 775 /var/www/storage

# Instalar dependências do PHP via Composer
composer install

# Instalar dependências do Node.js e executar a build
RUN npm install

# Executa as migrações do Laravel
php artisan migrate

# povoar o banco de dados com usuarios, tweets, comentarios  e funcao Seguir
php artisan db:seed

# Inicia o npm em modo aberto a todos os hosts
npm run dev -- --host &

# Inicia o servidor PHP-FPM
php-fpm


