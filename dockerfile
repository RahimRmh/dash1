# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory
WORKDIR /var/www/html

# Install dependencies
RUN docker-php-ext-install pdo pdo_mysql

# Copy the current directory contents into the container
COPY . /var/www/html

# Install composer and Laravel dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Ensure the storage and bootstrap/cache directories are writable
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Run Apache
CMD ["apache2-foreground"]
