# Utilise l'image officielle de PHP avec les extensions nécessaires
FROM php:8.1-fpm

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install intl pdo pdo_mysql opcache zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet dans le conteneur
WORKDIR /var/www/symfony
COPY . .

# Autoriser Composer à fonctionner avec les privilèges super utilisateur
ENV COMPOSER_ALLOW_SUPERUSER=1

# Installer les dépendances PHP
RUN composer install

# Appliquer les migrations (facultatif : ignorer les erreurs avec || true)
#RUN php bin/console doctrine:migrations:migrate --no-interaction || true

# Donner les permissions
RUN chown -R www-data:www-data /var/www/symfony/var

# Exposer le port
EXPOSE 9000

# Lancer PHP-FPM
CMD ["php-fpm"]
