## Тестовое в компанию Эд-АйТи

### Laravel 9 | PHP 8.2

#### Установка:

Склонировать себе, перейти в директорию, выполнить команду:

```mysql
    make up;
```

_Если не установлен **make**, выполнить команду:_

```mysql
    docker-compose up -d;
```

#### Использование:

Для входа внутрь контейнера, выполнить команду:

```mysql
    make php;
```

_Если не установлен **make**, выполнить команду:_

```mysql
    docker-compose exec php-fpm sh;
```

Далее внутри контейнера выполнить команду:

```mysql
    composer install;
    cp .env-example .env;
    php artisan key:generate;
```

Оставаясь внутри контейнера можно выполнить примеры:

##### Пример #1

```mysql
    php artisan intervals:list --left=10 --right=2000;
```

##### Пример #2

```mysql
    php artisan intervals:list --left=10;
```

_Но может и ничего не вернуть, смотря как сидер сгенерит примеры_
