<?php
require_once('User.php');
require_once('Task.php');
/*#2 Реализуйте два класса: Comment и TaskService. Comment должен содержать свойства author (User), task (Task) и text (string).
*/
class Comment {
    private User $author;
    private Task $task;
    private string $text;

    function __construct(User $author, Task $task, string $text)
    {
        $this->author = $author;
        $this->task = $task;
        $this->text = $text;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of task
     */ 
    public function getTask(): Task
    {
        return $this->task;
    }

    /**
     * Set the value of task
     *
     * @return  self
     */ 
    public function setTask(Task $task): self
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get the value of text
     */ 
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }
}