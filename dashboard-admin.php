<?php
    session_start();
    session_regenerate_id();

    if (empty($_SESSION["name"]) && empty($_SESSION["email"])) {
        header("location: login.php");
        exit;
    }

    if ($_SESSION["role"] != "admin") {
        header("Location: controller/dashboard-control.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="container">
            <div class="header-right">
                <div class="logo">
                    <h1><span class="icon">🎓</span></h1>
                </div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Manage Books</a></li>
                    <li><a href="manage-accounts.php">Manage Accounts</a></li>
                </ul>
            </div>
            <div class="header-right">
                <?php
                    if (empty($_SESSION['name']) && empty($_SESSION['email'])) {
                ?>
                <div class="login-create">
                    <a href="login.php" class="btn login-button">Login</a>
                </div>
                <?php
                    } else {
                ?>
                <div class="login-create">
                    <a href="controller/dashboard-control.php" class="btn login-button">Dashboard</a>
                </div>
                <?php
                    }
                ?>
            </div>
        </nav>
    </header>

    <section class="dashboard">
        <div class="container">
            <div class="logo-and-text">
                <img src="assets/img/logoPPKD.jpg" alt="Logo PPKD" class="logo">
                <div class="text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <a href="controller/logout-control.php">
            <button class="logout-button">Log Out</button>
        </a>
    </section>

    </section>

    <footer>
        <p>© 2024 Your Domain. All rights reserved.</p>
    </footer>
</body>
</html>
