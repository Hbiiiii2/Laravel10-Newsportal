# Dockerfile

# ---- Stage 1: Build Frontend Assets ----
FROM node:18-alpine AS builder_frontend
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# ---- Stage 2: Build PHP Dependencies ----
FROM composer:2.7 AS builder_backend
WORKDIR /app

# Gunakan 'apk' untuk install dependensi ekstensi 'intl'
RUN apk add --no-cache \
    icu-dev \
    && docker-php-ext-install intl

COPY . .
# Install dependensi tanpa dev, optimasi autoloader
RUN composer install --no-dev --no-interaction --optimize-autoloader

# ---- Stage 3: Final Production Image ----
# ---- PERUBAHAN DI SINI: Naikkan versi PHP ke 8.3 ----
FROM php:8.3-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install ekstensi PHP yang dibutuhkan oleh Laravel & project ini
# (Versi ini sudah disesuaikan untuk PHP 8.3)
RUN apk add --no-cache \
    libpng-dev \
    libzip-dev \
    jpeg-dev \
    freetype-dev \
    icu-dev \
    nginx \
    supervisor \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    gd \
    pdo_mysql \
    bcmath \
    zip \
    opcache \
    intl

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Hapus cache APK
RUN rm -rf /var/cache/apk/*

# Copy file aplikasi dari direktori lokal
COPY . /var/www/html

# Copy dependensi dari stage 'builder_backend'
COPY --from=builder_backend /app/vendor /var/www/html/vendor

# Copy aset yang sudah di-compile dari stage 'builder_frontend'
COPY --from=builder_frontend /app/public/build /var/www/html/public/build

# Atur kepemilikan file agar Nginx & PHP-FPM bisa menulis ke direktori storage/logs
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 untuk PHP-FPM
EXPOSE 9000

# Command untuk menjalankan PHP-FPM
CMD ["php-fpm"]