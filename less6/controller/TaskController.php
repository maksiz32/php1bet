<?php

require_once 'model/TaskProvider.php';
    // var_dump($_SESSION);
    // die;

if (isset($_GET['action']) && $_GET['action'] === 'taskdone') {
    $task = $_GET['task'];
    (new TaskProvider)->setTaskDone();
    header('Location: /?controller=task');
}

if (isset($_GET['action']) && $_GET['action'] === 'newtask') {
    (new TaskProvider)->addTask();
    header('Location: /?controller=task');
}

if (isset($_SESSION['user'])) {
    $pageName = 'TODO-список';

    $tasks = (new TaskProvider)->getUndoneList();

    require_once 'view/task.php';
}  else {
    header('Location: /');
}