<?php
session_start();

// Include the user array
require_once 'account-control.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkedLogin = false;

    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $checkedLogin = true;
            break;
        }
    }

    if ($checkedLogin) {
        header("Location: dashboard-control.php");
    } else {
        header("Location: ../login.php?error=login-failed");
    }
}
