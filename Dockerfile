# Usamos imagen oficial de PHP con Apache
FROM php:8.2-apache

# Si necesitas extensiones de PHP, instalarlas:
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite en Apache si lo necesitas para rutas limpias
RUN a2enmod rewrite

# Si tu aplicación tiene una carpeta de frontend / pública, por ejemplo "public" o "www", 
# cambia DocumentRoot. Si no, puedes dejar el default (var/www/html).
# Supongamos que tus archivos principales están directamente en la raíz del repo, no en subcarpeta.
# Si estuvieran en "public", descomenta las líneas relacionadas.

# Opcional: Si tienes carpeta "public":
# RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
#     && sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiar todo el contenido del repositorio al directorio que Apache sirve
COPY . /var/www/html/

# Ajustar permisos (para que Apache pueda leer/escribir según lo que necesites)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponer el puerto 80 para el contenedor
EXPOSE 80

# Comando por defecto para iniciar Apache en primer plano
CMD ["apache2-foreground"]
