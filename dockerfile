FROM php:8.2-fpm

# Install system dependencies and Nginx
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev zip nginx \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy app files
COPY . .

# Set permissions for Laravel storage and cache
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Copy default nginx config
COPY ./nginx.conf /etc/nginx/nginx.conf

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel setup
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Expose HTTP port
EXPOSE 80

# Start Nginx and PHP-FPM
CMD mysqld --innodb-use-native-aio=0 --disable-log-bin --performance_schema=0 --innodb-buffer-pool-size=1G
