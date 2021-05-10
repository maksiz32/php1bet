<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageName?></title>
    <style>
        .btn {
            display: inline-block;
            padding: 6px;
            background-color: blue;
            border-radius: 6px;
            text-decoration: none;
            color: #fff;
        }
        .btn:hover {
            background-color: aquamarine;
            color: #000;
        }
        section {
            margin: 30px 0 0 0;
        }
    </style>
</head>
<body>
    <main class="main">
        <article>
            <?php if (count($tasks) > 0) :?>
            Список с задачами:
            <ul>
                <?php foreach($tasks as $task) :?>
                    <li>
                        <?=$task?> <a class="btn" href="/?controller=task&action=taskdone&task=<?=$task?>">Выполнено</a>
                    </li>
                <?php endforeach ?>
            </ul>
            <?php endif ?>
                <form action="/?controller=task&action=newtask" method="post">
                    <input type="text" name="newtask">
                    <button type="submit">Добавить</button>
                </form>
        </article>
        <section>
            <a class="btn" href="/">Главная</a>
        </section>
    </main>
</body>
</html>