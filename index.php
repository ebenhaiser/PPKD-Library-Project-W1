<?php
    session_start();
    session_regenerate_id();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="container">
            <div class="header-right">
                <div class="logo">
                    <h1><span class="icon">🎓</span></h1>
                </div>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Books</a></li>
                    <li><a href="#">Map</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
            <div class="header-right">
                <?php
                    if (empty($_SESSION['name'])) {
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

    <section class="hero">
        <div class="container">
            <h2>We Help You to Learn New Things</h2>
            <a href="#" class="btn btn-primary">Start Reading Now!</a>
        </div>
    </section>

    <footer>
        <p>© 2024 Your Domain. All rights reserved.</p>
    </footer>
</body>
</html>
