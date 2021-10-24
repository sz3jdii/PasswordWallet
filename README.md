# Password Wallet
Simple Laravel app made for comparing SHA512 with HMAC algorithms.
## Setup


**1. Clone the project**


**2. Clone Laradock inside your project folder:**


    git pull --recurse-submodules --jobs=10


**3. Enter the laradock folder and rename env-example to .env**


    cp env-example .env


**4. Change php version to 8.0 in above .env file (laradock folder)**


    PHP_VERSION=8.0


**5. Open your project's .env file and set the following:**


    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=default
    DB_USERNAME=default
    DB_PASSWORD=secret


**6. Run your containers**


    docker-compose up -d nginx mysql phpmyadmin workspace 


**7. Run workspace container and install composer**


    docker-compose exec --user=laradock workspace bash

    composer install


**8. Run migrations and seeders**


    php artisan migrate --seed

