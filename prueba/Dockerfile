# Utiliza una imagen de Apache con PHP
FROM php:7.4-apache

# Establece el directorio de trabajo en /var/www/html/
WORKDIR /var/www/html/

# Copia el archivo index.php desde el directorio de tu aplicación al contenedor
COPY prueba/index.php .

# Otros comandos de configuración si es necesario

# Expone el puerto 80 para tráfico web
EXPOSE 80

# Comando para iniciar el servidor web de Apache
CMD ["apache2-foreground"]
