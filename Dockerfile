# Gunakan PHP 8.3 dengan Apache
FROM php:8.3-apache

# Install ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip bcmath

# Aktifkan mod_rewrite untuk Laravel
RUN a2enmod rewrite

# Salin semua file Laravel ke dalam container
COPY . /var/www/html

# Berikan izin yang tepat ke Laravel storage dan bootstrap cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Set working directory
WORKDIR /var/www/html

# Install Composer dan dependencies Laravel
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Jalankan Apache
CMD ["apache2-foreground"]
