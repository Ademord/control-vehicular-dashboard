# ademord/alpr-dashboard
# author: ademord

FROM ademord/iolaravel
COPY srv/ .
COPY app/ /var/www/laravel/app/
COPY routes/ /var/www/laravel/routes/
COPY vendor/ /var/www/laravel/vendor/
COPY public/ /var/www/laravel/public/
COPY resources/ /var/www/laravel/resources/
COPY config/app.php /var/www/laravel/config/app.php
COPY config/database.php /var/www/laravel/config/database.php
COPY composer.json /var/www/laravel/composer.json

COPY .env /var/www/laravel/.env
