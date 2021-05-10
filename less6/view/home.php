<!DOCTYPE html>
<html lang="ru_RU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageName?></title>
    <style>
        .btn {
            display: inline-block;
            padding: 10px;
            background-color: lightseagreen;
            border-radius: 6px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: aquamarine;
        }
    </style>
</head>
<body>
    <h1><?=$pageName?></h1>
    <?php if ($username === null) :?>
    <a href="/?controller=security" class="btn">Войти</a>
    <?php else :?>
    <h2>Hello, <?=$username?></h2>
    <p><a href="/?controller=task">TODO-список</a></p>
    <a href="/?controller=security&action=logout" class="btn">Выйти</a>
    <?php endif ?>
</body>
</html>