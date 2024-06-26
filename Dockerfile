
# Use the official PHP image as base
FROM php:latest

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo_mysql

# Update package lists and install MySQL client
RUN apt-get update && apt-get install -y \
    default-mysql-client

# Copy Apache virtual host configuration
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Enable Apache modules
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the application code into the container
COPY . .

# Expose ports
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

