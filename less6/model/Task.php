<?php

require_once 'model/User.php';

class Task {
    private string $description;
    private int $isDone;
    private string $user;

    public function __construct(string $description)
    {
        $this->description = $description;
        $this->isDone = 0;
        $this->user = $_SESSION['user'];
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsDone(): int
    {
        return $this->isDone;
    }

    public function setIsDone(): self
    {
        $this->isDone = 1;
        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }
}