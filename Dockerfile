FROM dunglas/frankenphp

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# Instala extensões PHP necessárias para o Laravel
RUN install-php-extensions \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia o Caddyfile
COPY docker/Caddyfile /etc/caddy/Caddyfile

WORKDIR /app

# Copia os arquivos de dependência do Composer para aproveitar o cache de camadas do Docker
COPY composer.json composer.lock ./

# Instala dependências do Composer
RUN composer install --no-interaction --no-scripts --no-autoloader --prefer-dist

# Copia todo o conteúdo do Laravel para o container
COPY . .

# Gera o autoloader otimizado
RUN composer dump-autoload --optimize

# Configura permissões para o Laravel
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

EXPOSE 8000