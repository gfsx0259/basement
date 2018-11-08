FROM php:7.2-fpm

RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \

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
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd \
    --with-gd \
    --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ && \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
  docker-php-ext-install -j${NPROC} gd && \
  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev


# install xdebug
RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER 1
