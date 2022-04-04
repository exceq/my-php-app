# Gloria Beans

Онлайн-магазин одежды, созданный на основе проекта [Yii 2](http://www.yiiframework.com/) basic.

______________

Локальный запуск проекта
------------------------
Запустить проект можно следующим способом:
- Скачать проект [exceq/docker-nginx-php-mysql](https://github.com/exceq/docker-nginx-php-mysql) -
это связка контейнеров из nginx, php, mysql, php-my-admin, 
подробнее в [README.md](https://github.com/exceq/docker-nginx-php-mysql/blob/master/README.md)
- Скачать текущий проект и поместить в папку `./docker-nginx-php-mysql/web/app/my-php-app`,
где my-php-app - текущий проект
- В папке `./docker-nginx-php-mysql` выполнить команду для запуска контейнеров `docker-compose up -d`
- После успешного запуска контейнеров будут доступны сервисы:

| Server     | host:port      |
|------------|----------------|
| my-php-app | localhost:8000 |
| PHPMyAdmin | localhost:8080 |
| MySQL      | localhost:8989 |

- Установить зависимости PHP с помощью composer. Выполнить следующую команду из папки `./docker-nginx-php-mysql`
```sh
docker run --rm -v $(pwd)/web/app/my-php-app:/app composer update
```
- В MySQL создать базу данных `shop` любым способом.
- Создать пользователя `login:shop password:shop`, дать ему права на БД `shop`,
либо поменять в `my-php-app/config/db.php` логин / пароль на `root/root`
- Обновить структуру БД, накатив миграцию:
```sh
docker-compose exec -T php ./app/my-php-app/yii migrate/up
```
Теперь проект готов к использованию.

______________


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

______________


REQUIREMENTS
------------
- docker
- docker-compose

______________

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.
