<?php

$user = null;

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$username = $user ? $user : null;

$pageName = 'Главная страница';

require_once 'view/home.php';
