<?php

$user = null;

if (isset($_SESSION['user'])) {
    /** @var User $user */
    $user = $_SESSION['user'];
}

$username = $user ? $user->getUsername() : null;

$pageName = 'Главная страница';

require_once 'view/home.php';
