# Usa imagem do PHP com FPM
FROM php:8.2-fpm

# Instala o Nginx e extensões do PHP necessárias
RUN apt-get update && apt-get install -y nginx \
    && docker-php-ext-install pdo pdo_mysql

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos da aplicação para o diretório público
COPY ./public /var/www/html

# Copia o arquivo de configuração do Nginx
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Ajusta as permissões
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta HTTP (Render detecta automaticamente)
EXPOSE 80

# Inicia o PHP-FPM e o Nginx ao subir o container
CMD service php8.2-fpm start && nginx -g 'daemon off;'
