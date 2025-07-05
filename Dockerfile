FROM php:8.2-fpm

# Instala o Nginx e extensões do PHP necessárias
RUN apt-get update && apt-get install -y nginx \
    && docker-php-ext-install pdo pdo_mysql

# Copia os arquivos da aplicação
COPY ./public /var/www/html

# Copia a configuração do Nginx
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta 80 (Render detecta automaticamente)
EXPOSE 80

# Inicia o PHP-FPM e o Nginx diretamente
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
