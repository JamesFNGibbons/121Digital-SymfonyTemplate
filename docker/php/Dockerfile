FROM php:8.2-fpm

# Install composer & PHP extensions you need
RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libicu-dev libonig-dev libssl-dev libpng-dev libjpeg-dev libfreetype6-dev libxml2-dev libcurl4-openssl-dev libxslt-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip intl mbstring gd xml curl xsl bcmath \
    && pecl install redis-6.0.2 \
    && docker-php-ext-enable redis

# Verify extensions are loaded and show PHP info
RUN php -m | grep redis && php --ri redis

# Install Node.js, npm, and Yarn (for asset build)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g yarn

# Define sympfony app environment variables
ENV DEST_HOME=/var/www/app
ENV APP_ENV=dev

# Install composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --2 --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/app

# Set composer memory limit
ENV COMPOSER_MEMORY_LIMIT=-1

# Copy composer files first for better caching
COPY composer.json ./

# Install dependencies
RUN composer install --no-interaction --no-scripts --no-autoloader

# Copy the rest of the application
COPY . .

# We build assets locally, so we will just copy the prebuilt assets here for simplicity
# Copy built assets
COPY public/build /var/www/app/public/build

# Generate autoloader
RUN composer dump-autoload --optimize

# Set proper permissions
RUN chown -R www-data:www-data /var/www/app

# Switch to www-data user
USER www-data

# Expose port 9000
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]