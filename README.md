# Directory structure
-config
    -common.php
    -db.php # Конфигурация MySql
    -param.php # Доп параметры
-core
    -application.php # Основной класс приложения
    -connection.php # Класс для работы с БД
    -input.php # Вспомогательный класс для работы с входящими данными
-view
    view.php # Шаблон страницы
-web # Директория DOCUMENT_ROOT
    -css
    -fonts
    -js
    -action.php # Контроллер для сторонних запросов
    -index.php # Фронтконтроллер
README.md
dump.sql # MySql Database dump
