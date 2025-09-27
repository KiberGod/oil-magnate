Сделать миграцию (локал-дев):

docker compose exec app bash
cd /var/www/html
php artisan migrate
