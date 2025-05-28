FROM php:8.3-apache

# Install intl extension
RUN apt-get update && apt-get install -y libicu-dev \
    && docker-php-ext-install intl

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy files into the container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

RUN touch /var/www/html/storage/history.txt && \
    chown www-data:www-data /var/www/html/storage/history.txt

# Expose port 80
EXPOSE 80
