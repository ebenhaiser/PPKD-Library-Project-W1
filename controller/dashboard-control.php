<?php
    session_start();
    session_regenerate_id();

    if (empty($_SESSION["name"]) && empty($_SESSION["email"])) {
        header("location: .../login.php");
        exit;
    }

    if ($_SESSION["role"] == "admin") {
        header("Location: ../dashboard-admin.php");
        exit;
    } elseif ($_SESSION["role"] == "user") {
        header("Location: ../dashboard-user.php");
        exit;
    }
?>