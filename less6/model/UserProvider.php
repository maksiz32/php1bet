<?php

require_once 'model/User.php';

class UserProvider {
    private array $accounts = [
        'Maksim' => 'Gb123123123',
    ];

    public function getUserByUsernameAndPassword(string $username, string $password): ?User {
        $existPassword = $this->accounts[$username] ?? null;
        if ($existPassword !== null && $existPassword === $password) {
            return new User($username);
        }

        return null;
    }
}