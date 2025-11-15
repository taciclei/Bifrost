# 🌈⚡ Bifrost - OCPP WebSocket Server Dockerfile
# Handles OCPP 1.6 and 2.0.1 connections from charge points

# =====================================
# Base Stage
# =====================================
FROM php:8.3-cli-alpine AS base

WORKDIR /app

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    libpq-dev \
    netcat-openbsd \
    openssl

# Install PHP extensions
RUN docker-php-ext-install \
    pdo_pgsql \
    sockets \
    pcntl

# Install PECL extensions
RUN apk add --no-cache --virtual .build-deps ${PHPIZE_DEPS} \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del .build-deps

# Install Composer
COPY --from=composer/composer:2-bin /composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

# =====================================
# Development Stage
# =====================================
FROM base AS ocpp_dev

ENV APP_ENV=dev

# Copy application
COPY app/composer.* app/symfony.lock ./
RUN composer install --prefer-dist --no-progress --no-interaction

COPY app .

# OCPP WebSocket server command
CMD ["php", "bin/console", "ocpp:server:start", "--env=dev", "-vv"]

# =====================================
# Production Builder
# =====================================
FROM base AS ocpp_builder

# Install dependencies (production only)
COPY app/composer.* app/symfony.lock ./
RUN composer install --no-cache --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress

# Copy application code
COPY app .

# Optimize autoloader
RUN composer dump-autoload --classmap-authoritative --no-dev

# =====================================
# Production Stage
# =====================================
FROM base AS ocpp_prod

ENV APP_ENV=prod

# Copy built application
COPY --from=ocpp_builder /app /app

# Create non-root user
RUN addgroup -g 1000 ocpp && adduser -D -u 1000 -G ocpp ocpp
USER ocpp

# Health check
HEALTHCHECK --interval=10s --timeout=3s --retries=3 \
    CMD nc -z localhost ${OCPP_WEBSOCKET_PORT:-9000} || exit 1

# Start OCPP server
CMD ["php", "bin/console", "ocpp:server:start", "--env=prod"]
