<?php

require_once 'model/TaskProvider.php';

$pdo = require 'dbconnect.php';

if (isset($_GET['action']) && $_GET['action'] === 'taskdone') {
    (new TaskProvider($pdo))->setTaskDone();
    header('Location: /?controller=task');
}

if (isset($_GET['action']) && $_GET['action'] === 'newtask') {
    (new TaskProvider($pdo))->addTask();
    header('Location: /?controller=task');
}

if (isset($_SESSION['user'])) {
    $pageName = 'TODO-список';

    $tasks = (new TaskProvider($pdo))->getUndoneList();

    require_once 'view/task.php';
}  else {
    header('Location: /');
}