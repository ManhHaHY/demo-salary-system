FROM php:7.2-fpm-alpine

LABEL Ha Tran <manhhaniit@gmail.com>

RUN apk update && apk add wget \
  curl \
  git \
  grep \
  nginx \
  build-base \
  libmemcached-dev \
  libmcrypt-dev \
  libxml2-dev \
  zlib-dev \
  autoconf \
  cyrus-sasl-dev \
  libgsasl-dev \
  bash \
  supervisor

RUN docker-php-ext-install -j$(nproc) pdo_mysql \
    mysqli \
    mbstring \
    pdo \
    bcmath \
    mysqli \
    tokenizer \
    xml \
    opcache

RUN rm /var/cache/apk/* && \
    mkdir -p /var/www/html

WORKDIR /var/www/html

COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisord.conf

RUN chown -R nginx:nginx  /var/www/html

EXPOSE 80 443

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisord.conf"]