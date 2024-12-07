
# Set base image
FROM php:8.0-fpm

# Install dependencies (including Composer)
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory inside the container
WORKDIR /var/www

# Copy application files into the container
COPY . .

# Install PHP dependencies (Laravel)
RUN composer install

# Expose the port (optional)
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
