# Usar la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar las extensiones necesarias de PHP
RUN apt update && apt install -y libpng-dev libjpeg-dev libfreetype6-dev zip libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql zip

# Activar mod_rewrite en Apache
RUN a2enmod rewrite

# Exponer el puerto 80
EXPOSE 80

# Arrancar Apache en primer plano
CMD ["apache2-foreground"]
