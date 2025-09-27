project-root/
│
├─ docker/
│   ├─ php/
│   │   ├─ Dockerfile
│   │   ├─ local.ini
│   │   └─ xdebug.ini
│   │
│   └─ nginx/
│       └─ default.conf
│
├─ docker-compose.yml
│
└─ src/                      # тут появится Laravel после create-project
    ├─ .env.example
    ├─ artisan
    ├─ composer.json
    └─ ...

1. Собрать контейнеры: docker compose build --no-cache
2. Поднять окружение: docker compose up -d
3. Зайти в контейнер app: docker compose exec app bash
4. Установить Laravel 12: composer create-project laravel/laravel:^12 .


х. Сгенерировать ключ: php artisan key:generate






=================================

Решение Cannot Save Files 
Following errors occurred on attempt to save files: Cannot save \\wsl$\Ubuntu\home\kiber_god\oil-magnate\src\.env. Unable to open the file for writing.

cd ~/oil-magnate/src

ls -la


# Сделать владельцем всех файлов и папок текущего пользователя
sudo chown -R kiber_god:kiber_god .

# Дать стандартные права:
# папки — 755, файлы — 644
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;

# для скриптов (artisan, и если есть .sh) — 755
chmod +x artisan




Вариант B — дать права на запись для всех (быстро, dev only)
sudo chmod -R a+rwX .

===================================
Решение file_put_contents(/var/www/html/storage/framework/views/9745f6a6f3fcc1ddd95648c9a006bc71.php): Failed to open stream: Permission denied


docker compose exec app bash

# внутри контейнера
cd /var/www/html
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
