<?php

require_once 'model/UserProvider.php';

$errors = [];

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['user']);
    header('Location: /');
}

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    $userProvider = new UserProvider();
    $user = $userProvider->getUserByUsernameAndPassword($username, $password);
    if ($user === null) {
        $errors[] = 'Введены неверные учетные данные';
    } else {
        $_SESSION['user'] = $user;
        header('Location: /');
    }
}

// if (isset($_SESSION['user'])) {
//     header('Location: /');
// }

$pageName = 'Авторизация';

require_once 'view/signin.php';