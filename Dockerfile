FROM dunglas/frankenphp:php8.3-bookworm
# Set the listening address for FrankenPHP's built-in server
ENV SERVER_NAME=":8080"
# Install Composer and required PHP extensions
# '@composer' installs Composer
# 'gd' 'pdo_mysql' and 'zip' mimic the original dependencies you installed.
RUN install-php-extensions @composer gd pdo_mysql zip
WORKDIR /var/www
COPY . .
RUN composer install \
--ignore-platform-reqs \
--optimize-autoloader \
--prefer-dist \
--no-interaction \
--no-progress
EXPOSE 8080