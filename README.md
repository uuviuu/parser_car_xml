<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## About project

Проект является реализацией парсера для файла public/xml/data_light.xml

Возможности проекта:
 - добавление данных из XML-выгрузки
 - обновление данных в базе данных, основываясь на XML-выгрузке
 - удаление данных, которых нет в XML-выгрузке, из базы данных
 - парсинг доступен по консольной команде php artisan command:parser с возможностью указать путь до файла или использовать путь по умолчанию, аналогичный результат по url /parser

Для упрощения развертывания проекта предусмотрен Docker

Установка предполагает, что у вас уже установлен и настроен Docker, и присутсвует среда разработки Linux, проект разрабатывался на версии Ubuntu-22.04

## Installation

Подготовьте рабочее простанство для развертывания проекта:

- в папку с проектами установите репозиторий командой git clone https://github.com/uuviuu/parser_car_xml.git

Для установки введите команды:

- docker-compose up -d - установить зависимости из файла docker-compose.yml, переименуйте поля container_name, если они уже используются, если возникнет ошибка занятости порта, то измените порты nginx и db, оставив значения после двоеточия

- sudo chmod 777 -R ./ - передача прав пользователя проекту (попросит пароль пользователя)

- docker exec -it parser_car_php bash - войти в контейнер

- composer update - установка библиотек PHP

- composer dump-autoload - включение классов, которые используются в проекте

- cp .env.example .env - создание файла .env, после этого внести в него правки:

   -  DB_HOST=db
   -  DB_DATABASE=parser_car
   -  DB_USERNAME=parser_car
   -  DB_PASSWORD=parser_car

- php artisan key:generate - создание секретного ключа

- php artisan command:parser - использование парсера

Контакты: 
 - [почта](mailto:my.test.laravel.message@gmail.com) 
 - [telegram](https://t.me/uuviuu)
