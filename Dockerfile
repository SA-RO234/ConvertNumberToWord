# Use official PHP + Apache
FROM php:8.3-apache

# Enable rewrite
RUN a2enmod rewrite

# Create and set permissions for the storage folder
RUN mkdir -p /var/www/html/storage
COPY storage/history.txt /var/www/html/storage/history.txt
RUN chmod -R 777 /var/www/html/storage

# Copy all app files
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port
EXPOSE 80
