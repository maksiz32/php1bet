<?php

if(!isset($_SESSION['user'])) {

    $pageName = 'Авторизация';
    
        $pdo = require 'dbconnect.php';
    
        $errors = [];

        if(isset($_GET['action']) && $_GET['action'] === 'registration') {
            if (isset($_POST['name'], $_POST['username'], $_POST['password'])) {
                ['name' => $name, 'username' => $username, 'password' => $password] = $_POST;
        
                $newuserv = new User($name);
                $newuserv->setUsername($username);
                $password = password_hash($password, PASSWORD_DEFAULT);
        
                $userProvider = new UserProvider($pdo);
                $user = $userProvider->createUser($name, $username, $password);
                if ($user === null) {
                    $errors[] = 'Введены неверные учетные данные';
                } else {
                    $_SESSION['user'] = $newuserv->getUsername();;
                    header('Location: /');
                }
            }
        
            require_once 'view/signup.php';
        } else {

            if (isset($_GET['action']) && $_GET['action'] === 'logout') {
                unset($_SESSION['user']);
                header('Location: /');
            }

            if (isset($_POST['username'], $_POST['password'])) {
                ['username' => $username, 'password' => $password] = $_POST;
                // $username = $_POST['username'];
                // $password = $_POST['password'];

                $userProvider = new UserProvider($pdo);
                $user = $userProvider->getUserByUsernameAndPassword($username, $password);
                if ($user === null) {
                    $errors[] = 'Введены неверные учетные данные';
                } else {
                    $_SESSION['user'] = $user->getUsername();;
                    header('Location: /');
                }
            }

            require_once 'view/signin.php';
        }
}