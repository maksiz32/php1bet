<?php

require_once 'model/User.php';

class Task {
    private string $description;
    private bool $isDone;
    private User $user;

    public function __construct(string $description)
    {
        $this->description = $description;
        $this->isDone = false;
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

    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    public function setIsDone(): self
    {
        $this->isDone = true;
        return $this;
    }
}