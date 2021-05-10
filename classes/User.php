<?php
class User {
    private string $username;
    private string $email;
    private ?string $sex;
    private ?int $age;
    private bool $isActive = true;
    private DateTime $dateCreated;
 
    function __construct(string $username, string $email) {
        $this->username = $username;
        $this->email = $email;
 
        $this->dateCreated = new DateTime(); // Текущие дата и время
    }
 
    function getUsername(): string {
        return $this->username ?? 'unknown';
    }

    private function getValidAge(?int $age): ?int {
        if ($age > 0 && $age <= 125) {
            return $age;
        }
        return null;
    }

    public function setAge(?int $age): void {
        $this->age = $this->getValidAge($age);
    }

    function getAge(): ?int {
       return $this->age;
    }


 }
 