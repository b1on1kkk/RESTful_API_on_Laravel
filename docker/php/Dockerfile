FROM php:8.2.1-fpm

# Устанавливаем рабочую директорию 
WORKDIR /var/www/html

# Копируем composer.lock и composer.json
COPY ../../src/composer.lock ../../src/composer.json /var/www/html/

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    netcat

# Очищаем кэш
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Устанавливаем расширения PHP
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Загружаем актуальную версию Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Создаём пользователя и группу www для приложения Laravel
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Копируем содержимое текущего каталога в рабочую директорию
COPY ../../src /var/www/html
COPY --chown=www:www ../../src /var/www/html

COPY ../../src/start.sh /var/www/html

# Меняем пользователя на www
USER www

# В контейнере открываем 9000 порт и запускаем сервер php-fpm
EXPOSE 9000
CMD ["/var/www/html/start.sh"]