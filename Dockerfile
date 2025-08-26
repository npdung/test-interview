# syntax=docker/dockerfile:1.5
# Builder images
ARG NODE_VERSION=20.19.4

FROM composer/composer:2-bin AS composer

FROM mlocati/php-extension-installer:latest AS php_extension_installer

FROM node:${NODE_VERSION}-alpine AS node

FROM php:8.4.11-fpm-alpine3.22 AS app_php

COPY --from=node /usr/lib /usr/lib
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /usr/local/include /usr/local/include
COPY --from=node /usr/local/bin /usr/local/bin

ARG APP_ENV=prod
WORKDIR /srv/app

# php extensions installer: https://github.com/mlocati/docker-php-extension-installer
COPY --from=php_extension_installer --link /usr/bin/install-php-extensions /usr/local/bin/

# persistent / runtime deps
RUN apk add --no-cache \
        acl \
        fcgi \
        file \
        gettext \
        git \
    ;

RUN set -eux; \
    extensions="intl zip apcu sqlite3 opcache bcmath mysqli gd imap pdo_mysql"; \
    if [ "$APP_ENV" = "dev" ]; then \
        extensions="$extensions xdebug"; \
    fi; \
    install-php-extensions $extensions


RUN if [ "$APP_ENV" = "prod" ]; then \
      mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"; \
    else \
      mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"; \
    fi

COPY --link docker/php/conf.d/app.ini $PHP_INI_DIR/conf.d/
COPY --link docker/php/conf.d/app.${APP_ENV}.ini $PHP_INI_DIR/conf.d/

COPY --link docker/php/php-fpm.d/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
RUN mkdir -p /var/run/php

CMD ["php-fpm"]

# entrypoint
COPY --link --chmod=755 docker/entrypoint.sh /usr/local/bin/docker-entrypoint
ENTRYPOINT ["docker-entrypoint"]

# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV PATH="${PATH}:/root/.composer/vendor/bin"

COPY --from=composer --link /composer /usr/bin/composer

COPY --link composer.* ./

WORKDIR /srv/app
