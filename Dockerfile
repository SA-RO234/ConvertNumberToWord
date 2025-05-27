# Use the official PHP image with Apache
FROM php:8.3-apache 
# Enable Apache mod_rewrite (optional, but common for PHP apps)
RUN a2enmod rewrite
# Copy application files
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Set recommended permissions (optional, adjust as needed)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (default for Apache)
EXPOSE 80
