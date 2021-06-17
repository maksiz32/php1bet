<?php

require_once 'model/Task.php';

class TaskProvider {

    private PDO $pdo;

    function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUndoneList(): array {
        $arr = [];
        $user = $_SESSION['user'];
        if (isset($user)) {
            $statement = $this->pdo->prepare("SELECT * FROM `tasks` WHERE user = :user AND isDone < 1");
            $statement->execute([
                'user' => $user
            ]);
            $res = $statement->fetchAll();
            if($res) {
                foreach($res as $result) {
                    $arr[] =  [
                        'id' => $result['id'],
                        'description' => $result['description']
                    ];
                }
                return $arr;
            }
        }
        return $arr;
    }

    public function addTask(): bool {
        $request = $_POST['newtask'];
        
        if (isset($_SESSION['user'])) {
            if (isset($request) && $request !== "") {
                $task = new Task($request);
                $statement = $this->pdo->prepare("INSERT INTO `tasks` (description, isDone, user) 
                                        VALUES (:description, :isDone, :user)");
                $statement->execute([
                    'description' => $task->getDescription(),
                    'isDone' => $task->getIsDone(),
                    'user' => $task->getUser()
                ]);
                return true;
            } else {
                return false;
            }
        }
    }

    public function setTaskDone(): bool {
        $id = $_GET['task'];
        $statement = $this->pdo->prepare(('SELECT id, description FROM tasks WHERE id = :id LIMIT 1'));
        $statement->execute(([
            'id' => $id
        ]));
        $res = $statement->fetchObject(Task::class, [$id]);
        if($res) {
            $res->setIsDone();
            $query = "UPDATE tasks SET isDone = {$res->getIsDone()} WHERE (id = {$id})";
            $statement = $this->pdo->query($query);
            return true;
        } else {
            return false;
        }
    }
}