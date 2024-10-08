FROM php:8.3-apache

# Instalação de pacotes adicionais
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip tzdata fcgiwrap supervisor \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalação e habilitação da extensão Redis
RUN pecl install redis \
    && docker-php-ext-enable redis

# Instalação de extensões PHP
RUN docker-php-ext-install zip pdo_mysql mbstring exif pcntl bcmath gd calendar opcache intl

# Habilitar o módulo rewrite do Apache
RUN a2enmod rewrite

# Configuração do Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Configuração do diretório de trabalho
WORKDIR /var/www/html

# Instalação do Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia os arquivos do projeto Laravel para o contêiner
COPY . .

# Instalação das dependências do Laravel
RUN composer install --no-dev

# Permissões
RUN chown -R www-data:www-data storage bootstrap/cache

# Configuração do Supervisor para rodar o queue:work
COPY supervisor-queue.conf /etc/supervisor/conf.d/supervisor-queue.conf

# Expor as portas 80 e 9000 do contêiner
EXPOSE 80 9000

# Comando padrão para iniciar o Supervisor e o Apache ao iniciar o contêiner
CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
