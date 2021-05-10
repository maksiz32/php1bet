<?php
/*
#2 Реализуйте два класса: Comment и TaskService. TaskService должен реализовывать статичный метод addComment(User, Task, text), добавляющий к задаче комментарий пользователя. Отношение между классами задачи и комментария должны быть построены по типу ассоциация, поэтому необходимо добавить соответствующее свойство и методы классу Task.
*/

class TaskService {

    static function addComment(User $user, Task $task, string $text): void {
        self::$user = $user;
        self::$task = $task;
        self::$text = $text;

    }
}