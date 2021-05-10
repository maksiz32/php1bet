<?php
/*
#1 Разработайте класс Task, выполняющий ответственность обычной задачи Todo-списка. Класс должен содержать приватные свойства description, dateCreated, dateUpdated, dateDone, priority (int), isDone (bool) и обязательное user (User). В качества класса пользователя воспользуйтесь разработанным на уроке. Класс Task должен содержать все необходимые для взаимодействия со свойствами методы (getters, setters). При вызове метода setDescription обновляйте значение свойства dateUpdated. Разработайте метод markAsDone, помечающий задачу выполненной, а также обновляющий свойства dateUpdated и dateDone.
*/
require_once('User.php');
require_once('TaskService.php');

class Task {
    private string $description;
    private DateTime $dateCreated;
    private ?DateTime $dateUpdate;
    private ?DateTime $dateDone;
    private int $priority;
    private bool $isDone;
    private User $user;

    function __construct(User $user) {
        $this->user = $user;
        $this->dateCreated = new DateTime();
    }

    public function setComment(string $text): self 
    {
        TaskService::addComment($this->user, $this, $text);
        return $this;
    }

    public function markAsDone(): self {
        $this->isDone = true;
        $this->priority = -INF;
        ($this->setDateUpdate())->setDateDone();
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description): self
    {
        $this->description = $description;
        $this->setDateUpdate();
        return $this;
    }

    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }

    public function setDateCreated(): self
    {
        $this->dateCreated = new DateTime();
        return $this;
    }

    public function getDateUpdate(): ?DateTime
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(): self
    {
        $this->dateUpdate = new DateTime();
        return $this;
    }

    public function getDateDone(): ?DateTime
    {
        return $this->dateDone;
    }

    public function setDateDone(): self
    {
        $this->dateDone = new DateTime();
        return $this;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;
        return $this;
    }

    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): self
    {
        $this->isDone = $isDone;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }
}