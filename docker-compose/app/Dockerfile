# Usando a imagem base do PHP 8.4 com FPM
FROM php:8.3-fpm

# Instalar dependências do sistema e extensões do PHP
RUN apt-get update && apt-get install -y \
    git \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Definir o diretório de trabalho
WORKDIR /var/www

# Copiar os arquivos do projeto para o contêiner
COPY . .

# Adiciona a permissão de execução ao script
RUN chmod +x start.sh

# Expor a porta 9000 para o PHP-FPM
EXPOSE 9000

# Script de inicialização
CMD ["bash", "/var/www/start.sh"]
