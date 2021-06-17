<?php

require_once 'autoload.php';

class UserProvider {
    
    private PDO $pdo;

    function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createUser(string $name, string $username, string $password): bool {
        if (strlen($username) > 30) {
            throw new UsernameLenExeption('Длина поля "Имя пользователя" не должна превышать 30 символов. Попробуйте еще раз.');
        }
        $statement = $this->pdo->prepare(
            'INSERT INTO users (name, username, password) VALUE (:name, :username, :password)'
        );
        if (!$statement) {
            return false;
        }
        $statement->execute([
            'name' => $name,
            'username' => $username,
            'password' => $password
        ]);
        if ($statement) {
            return true;
        }
        return false;
    }

    public function getUserByUsernameAndPassword(string $username, string $password): ?User {
        $statement = $this->pdo->prepare(
            'SELECT * FROM `users` WHERE username = :username'
        );
        if (!$statement) {
            return null;
        }

        $statement->execute([
            'username' => $username
        ]);
        $res = $statement->fetchObject(User::class, [$username]);

        if ($res && password_verify($password, $res->password)) {
            return $res;
        } else {
            return null;
        }
    }

    public function insert(User $user, string $password): bool 
    {
        $statement = $this->pdo->prepare("INSERT INTO `users` (username, password, name) 
                                        VALUES
                                        (:username, :password, :name)");

        return $statement && $statement->execute([
            'username' => $user->getUsername(),
            'password' => $password,
            'name' => $user->getName()
        ]);
    }
}