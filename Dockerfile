FROM composer:2.7
WORKDIR /app/
COPY ./composer.json ./composer.lock ./
RUN composer install --no-dev --no-progress
COPY ./ ./
CMD ["composer", "run-script", "start"]
