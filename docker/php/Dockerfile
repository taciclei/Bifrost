# 🌈⚡ Bifrost - PHP/FrankenPHP Dockerfile
# Multi-stage build for API Platform + Sylius + OCPP
# Based on API Platform Demo best practices

# =====================================
# Stage 1: Base FrankenPHP Image
# =====================================
FROM dunglas/frankenphp:latest-php8.3 AS frankenphp_upstream

# =====================================
# Stage 2: Shared Base Configuration
# =====================================
FROM frankenphp_upstream AS frankenphp_base

WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    acl \
    file \
    gettext \
    git \
    netcat-openbsd \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions required by Sylius and API Platform
RUN install-php-extensions \
    apcu \
    bcmath \
    exif \
    gd \
    intl \
    opcache \
    pdo_pgsql \
    redis \
    zip \
    amqp \
    # OCPP-specific
    sockets \
    pcntl

# Install Composer
COPY --from=composer/composer:2-bin /composer /usr/bin/composer

# Configure PHP for production
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Copy PHP configuration
COPY docker/php/conf.d/app.ini $PHP_INI_DIR/conf.d/
COPY docker/php/conf.d/app.prod.ini $PHP_INI_DIR/conf.d/

# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

# Prevent Composer from slowing down
ENV COMPOSER_NO_INTERACTION=1

# =====================================
# Stage 3: Development Build
# =====================================
FROM frankenphp_base AS frankenphp_dev

# XDebug for development
RUN install-php-extensions xdebug

# Development PHP configuration
COPY docker/php/conf.d/app.dev.ini $PHP_INI_DIR/conf.d/

# Allow var directory to be writable
VOLUME /app/var/

ENV APP_ENV=dev \
    XDEBUG_MODE=off

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]

# =====================================
# Stage 4: Production Builder
# =====================================
FROM frankenphp_base AS frankenphp_builder

# Copy application files
COPY app/composer.* app/symfony.lock ./

# Install dependencies (without dev)
RUN set -eux; \
    composer install --no-cache --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress; \
    composer clear-cache

# Copy application code
COPY app .

# Generate optimized autoloader
RUN set -eux; \
    mkdir -p var/cache var/log; \
    composer dump-autoload --classmap-authoritative --no-dev; \
    composer dump-env prod; \
    composer run-script --no-dev post-install-cmd; \
    chmod +x bin/console; \
    sync;

# =====================================
# Stage 5: Production Runtime
# =====================================
FROM frankenphp_base AS frankenphp_prod

# Copy built application from builder
COPY --from=frankenphp_builder /app /app

# Copy Caddyfile
COPY docker/frankenphp/Caddyfile /etc/caddy/Caddyfile

ENV APP_ENV=prod \
    APP_DEBUG=0 \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS=0

# Set proper permissions
RUN set -eux; \
    mkdir -p var/cache var/log; \
    chmod +x bin/console; \
    chown -R www-data:www-data var;

# Health check
HEALTHCHECK --start-period=60s CMD curl -f http://localhost:2019/metrics || exit 1

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
