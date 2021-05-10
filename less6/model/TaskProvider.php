<?php

require_once 'model/Task.php';

class TaskProvider {

    public function getUndoneList(): array {
        $arr = [];
        if (isset($_SESSION['user']) && isset($_SESSION['tasks'])) {
            foreach ($_SESSION['tasks'] as $key => $task) {
                if ($_SESSION['tasks'][$key] === false) {
                    $arr[] = $key;
                }
            }
        }
        return $arr;
    }

    public function addTask(): bool {
        $request = $_POST['newtask'];
        if (isset($_SESSION['user'])) {
            if (isset($request) && !is_null($request)) {
                $task = new Task($request);
                $_SESSION['tasks'][$task->getDescription()] = $task->getIsDone();
                return true;
            } else {
                return false;
            }
        }
    }

    public function setTaskDone() {
        $request = $_GET['task'];
        if (isset($_SESSION['tasks'][$request])) {
            $_SESSION['tasks'][$request] = true;
        }
    }
}