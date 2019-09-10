# Directory structure
-------------------

```
-config/             # Конфигурация приложения
    -common.php      # Агрегатор конфигов
    -db.php          # Конфигурация MySql
    -param.php       # Доп параметры
-core/               # Основная логика
    -application.php # Основной класс приложения
    -connection.php  # Класс для работы с БД
    -input.php       # Вспомогательный класс для работы с входящими данными
-view/               # Шаблоны
    view.php         # Шаблон страницы
-web/                # Директория DOCUMENT_ROOT
    -css/            # Файлы css
    -fonts/          # Файлы шрифтов bootstrap
    -js/             # Файлы js
    -action.php      # Контроллер для сторонних запросов
    -index.php       # Фронтконтроллер
README.md            # Файл readme
dump.sql             # MySql Database dump
```