FROM php:7.2-fpm

# install dependencies
RUN apt-get install -y \
        zlib1g-dev \
        && docker-php-ext-install -j$(nproc) \
        iconv \
        mcrypt \
        mbstring \
        zip \
        && docker-php-ext-configure mbstring --enable-mbstring \
        && docker-php-ext-configure zip --enable-zip

# install GD
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng12-dev \
    && docker-php-ext-configure gd \
    --with-freetype-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-enable gd


# install xdebug
RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER 1
