FROM php:8.2-fpm

# Instala extensões necessárias para conexão com MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos para dentro do container
COPY . .

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80