<?php
session_start();
session_regenerate_id();

// Redirect to login if not authenticated
if (empty($_SESSION["name"]) && empty($_SESSION["email"])) {
    header("location: login.php");
}

// Redirect to dashboard if not admin
if ($_SESSION["role"] != "admin") {
    header("Location: controller/dashboard-control.php");
}

// Include user data from the user-control.php
include 'controller/user-control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Accounts</title>
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

    <section class="manage-accounts" style="background: url('assets/img/heading2.jpg') no-repeat center center/cover; height: 100vh;">
        <div class="container">
                </br>
                </br>
            <h2 class="text-white">Manage Accounts</h2>
            <table class="table table-bordered table-light">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Level</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assuming $users is the array retrieved from user-control.php
                    if (!empty($users)) {
                        foreach ($users as $index => $user) {
                            echo "<tr>";
                            echo "<td>" . ($index + 1) . "</td>";
                            echo "<td>" . htmlspecialchars($user['role']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                            echo '<td>
                                <a href="controller/edit-account.php?id=' . $index . '" class="btn btn-warning btn-sm">Edit</a>
                                <a href="controller/delete-account.php?id=' . $index . '" class="btn btn-danger btn-sm">Delete</a>
                            </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No users found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <footer>
        <p>© 2024 Your Domain. All rights reserved.</p>
    </footer>
</body>
</html>
