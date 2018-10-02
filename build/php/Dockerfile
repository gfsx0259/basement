FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN apt-get install -y \
        zlib1g-dev

RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-configure mbstring --enable-mbstring \
    && docker-php-ext-configure zip --enable-zip \
    && docker-php-ext-install \
        mbstring \
        zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER 1

#WORKDIR /var/www
#CMD ["php-fpm"]