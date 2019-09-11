<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Выше 3 Мета-тега, которые *должны* находиться у вас  в head ; любой другой  контент может быть *после* этих тегов -->
    <title>Test task</title>
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/signin.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- Предупреждение: Respond.js не работает при просмотре страницы через файл:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script >
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div id="alert" class="alert alert-message" role="alert"></div>
    <div class="form-container">
        <form class="form-signin">
            <input type="hidden" id="_csrf" value="<?= $app->generateKey();?>">
            <h2 class="form-signin-heading">Заполните форму</h2>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">
            <label for="inputName" class="sr-only">Имя</label>
            <input type="text" id="inputName" class="form-control" placeholder="Имя" required="">
            <label for="inputMessage" class="sr-only">Текст</label>
            <textarea id="inputMessage" class="form-control" placeholder="Текст"></textarea>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        </form>
    </div>

    <p><?// $_SERVER['HTTP_REFERER']?></p>
    <p><?// $_SERVER['HTTP_HOST']?></p>

</div>
<!-- на jQuery (необходим для Bootstrap - х JavaScript плагины) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Включают все скомпилированные плагины (ниже), или включать отдельные файлы по мере необходимости -->
<script src="/js/bootstrap.js"></script>
<script src="/js/config.js"></script>
<script src="/js/action.js"></script>
</body>
</html>