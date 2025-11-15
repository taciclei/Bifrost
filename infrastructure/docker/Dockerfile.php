ARG PHP_VERSION=8.3

FROM php:${PHP_VERSION}-fpm-alpine

# Argumentos de build
ARG COMPOSER_VERSION=2.7

# Instalar dependências do sistema
RUN apk add --no-cache \
    bash \
    curl \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    icu-dev \
    postgresql-dev \
    oniguruma-dev \
    libxml2-dev \
    rabbitmq-c-dev \
    linux-headers \
    $PHPIZE_DEPS

# Configurar timezone
RUN apk add --no-cache tzdata && \
    cp /usr/share/zoneinfo/America/Belem /etc/localtime && \
    echo "America/Belem" > /etc/timezone

# Instalar extensões PHP necessárias para Sylius
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) \
    gd \
    intl \
    pdo \
    pdo_pgsql \
    pgsql \
    opcache \
    zip \
    exif \
    pcntl \
    bcmath \
    soap \
    sockets

# Instalar Redis extension
RUN pecl install redis-6.0.2 && \
    docker-php-ext-enable redis

# Instalar APCu para cache
RUN pecl install apcu-5.1.23 && \
    docker-php-ext-enable apcu

# Instalar AMQP (opcional, para RabbitMQ se necessário)
# RUN pecl install amqp-2.1.2 && \
#     docker-php-ext-enable amqp

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=${COMPOSER_VERSION}

# Configurar PHP para produção/desenvolvimento
COPY infrastructure/docker/php/php.ini /usr/local/etc/php/php.ini
COPY infrastructure/docker/php/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf

# Otimizações do OPcache para Symfony
RUN echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.memory_consumption=256" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.max_accelerated_files=20000" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.interned_strings_buffer=16" >> /usr/local/etc/php/conf.d/opcache.ini

# Configurar usuário não-root
RUN addgroup -g 1000 sylius && \
    adduser -D -u 1000 -G sylius sylius

# Definir working directory
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY --chown=sylius:sylius . .

# Instalar dependências do Composer (em produção usar --no-dev --optimize-autoloader)
RUN composer install --no-interaction --prefer-dist --no-scripts

# Permissões para cache e logs
RUN mkdir -p var/cache var/log && \
    chown -R sylius:sylius var/cache var/log && \
    chmod -R 775 var/cache var/log

# Mudar para usuário não-root
USER sylius

# Expor porta PHP-FPM
EXPOSE 9000

# Comando padrão
CMD ["php-fpm"]

# Healthcheck
HEALTHCHECK --interval=30s --timeout=3s --start-period=40s --retries=3 \
  CMD php-fpm-healthcheck || exit 1
