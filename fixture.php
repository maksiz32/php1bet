<?php

require_once 'autoload.php';

/** @var PDO $pdo*/
$pdo = require 'dbconnect.php';

// Начальные данные для `users`
$pdo->exec('CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(150),
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL
)');

$user = new User('TestUser');
$user->setUsername('Maksim');
$password = password_hash('password123', PASSWORD_DEFAULT);

$userProvider = new UserProvider($pdo);
$result = $userProvider->insert($user, $password);
if(!$result) {
  var_dump(($pdo->errorInfo()));
    echo "Неудалось создать пользователя\n";
}

//Создание таблицы в БД для Task
$pdo->exec('CREATE TABLE tasks (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, description VARCHAR(255),
    isDone TINYINT, user VARCHAR(255))');
