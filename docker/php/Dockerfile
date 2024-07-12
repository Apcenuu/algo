### Builder
FROM --platform=linux/amd64 php:8.3-fpm AS builder
WORKDIR /app

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions @composer-2 xdebug pgsql pdo_pgsql

COPY ./docker/php/root-php-fpm.conf /usr/local/etc/php-fpm.d/zzz-docker.conf

CMD ["php-fpm", "-R"]

### App
FROM builder AS app

WORKDIR /app

COPY ./docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini
COPY --chown=www-data:www-data composer.json composer.lock ./

RUN composer i --no-scripts --no-dev && \
	composer dump-autoload -a -o
