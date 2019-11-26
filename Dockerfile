FROM php:7.3.12-zts-alpine

RUN apk add --no-cache alpine-sdk $PHPIZE_DEPS && \
    docker-php-ext-install mysqli pcntl && \
    cd /tmp && \
    git clone https://github.com/krakjoe/pthreads.git && \
    cd pthreads && \
    phpize && \
    ./configure && \
    make && \
    make install && \
    docker-php-ext-enable pthreads && \
    cd .. && \
    rm -rf pthreads && \
    pecl install parallel && \
    docker-php-ext-enable parallel && \
    sudo curl -s https://getcomposer.org/installer | php && \
    sudo mv composer.phar /usr/local/bin/composer && \
    apk del alpine-sdk $PHPIZE_DEPS && \
    rm -rf /var/cache/apk/*

WORKDIR /srv
