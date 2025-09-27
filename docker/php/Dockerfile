FROM php:8.3-fpm

ARG UID=1000
ARG GID=1000

# Системные зависимости
RUN apt-get update && apt-get install -y \
    git unzip zip curl libzip-dev libpng-dev libjpeg-dev libfreetype6-dev \
    libicu-dev libonig-dev libxml2-dev build-essential \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql mbstring exif pcntl bcmath gd intl opcache zip \
    && pecl install redis xdebug \
    && docker-php-ext-enable redis xdebug \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && useradd -G www-data,root -u ${UID} -m developer \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN sed -i "s/user = www-data/user = developer/" /usr/local/etc/php-fpm.d/www.conf \
 && sed -i "s/group = www-data/group = developer/" /usr/local/etc/php-fpm.d/www.conf \
 && sed -i "s/listen.owner = www-data/listen.owner = developer/" /usr/local/etc/php-fpm.d/www.conf \
 && sed -i "s/listen.group = www-data/listen.group = developer/" /usr/local/etc/php-fpm.d/www.conf

WORKDIR /var/www/html

EXPOSE 9000

CMD ["php-fpm"]

USER developer
