FROM php:8.2-fpm

WORKDIR /var/www/html

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libpq-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala extensões PHP necessárias para o Laravel
# Adicionado mysqli e suporte para PostgreSQL
RUN docker-php-ext-install pdo pdo_mysql mysqli pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria a estrutura de diretórios do Laravel com permissões corretas
# Essas permissões são importantes para o cache, sessions, logs, etc.
RUN mkdir -p /var/www/html/storage/framework/{sessions,views,cache} \
    && mkdir -p /var/www/html/storage/logs \
    && chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage

# Copia os arquivos de dependência do Composer para aproveitar o cache de camadas do Docker
COPY composer.json composer.lock ./

# Instala dependências do Composer sem rodar scripts nem gerar o autoloader final ainda
RUN composer install --no-interaction --no-scripts --no-autoloader --prefer-dist

# Copia todo o conteúdo do Laravel para o container
COPY . .

# Gera o autoloader otimizado e roda os scripts pós-instalação
RUN composer dump-autoload --optimize

# Configura permissões finais para o Laravel
# Garante que o PHP-FPM (www-data) possa ler e escrever nos diretórios necessários
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \; \
    && chmod -R 775 /var/www/html/storage bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8000

CMD ["php-fpm"]