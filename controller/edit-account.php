<?php
session_start();
session_regenerate_id();

// Redirect to login if not authenticated
if (empty($_SESSION["name"]) && empty($_SESSION["email"])) {
    header("location: ../login.php");
}

// Redirect to dashboard if not admin
if ($_SESSION["role"] != "admin") {
    header("Location: ../controller/dashboard-control.php");
}

// Include user data from the user-control.php
include 'account-control.php';

// Check if the ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validate ID and check if user exists
    if (isset($users[$id])) {
        $user = $users[$id];
    } else {
        // Redirect to manage accounts if user not found
        header("Location: ../manage-accounts.php");
        exit;
    }
} else {
    // Redirect to manage accounts if no ID is provided
    header("Location: ../manage-accounts.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update user data
    $users[$id]['name'] = $_POST['name'];
    $users[$id]['email'] = $_POST['email'];
    $users[$id]['role'] = $_POST['role'];

    // Save the updated user data back to user-control.php or wherever you manage user data
    // For simplicity, this example won't implement persistent storage. 
    // In a real application, you would want to save changes to a database.

    header("Location: ../manage-accounts.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Account</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <nav class="container">
            <div class="header-right d-flex justify-content-between align-items-center">
                <div class="logo">
                    <h1><span class="icon">🎓</span></h1>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../manage-accounts.php">Manage Accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Books</a>
                    </li>
                </ul>
                <div class="header-right">
                    <?php
                    if (empty($_SESSION['name']) && empty($_SESSION['email'])) {
                    ?>
                    <div class="login-create">
                        <a href="../login.php" class="btn login-button">Login</a>
                    </div>
                    <?php
                    } else {
                    ?>
                    <div class="login-create">
                        <a href="../controller/dashboard-control.php" class="btn login-button">Dashboard</a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <section class="edit-account">
        <div class="container">
            <h2>Edit User Account</h2>
            <form action="edit-account.php?id=<?php echo $id; ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" required>
                        <option value="admin" <?php echo $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="user" <?php echo $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update Account</button>
                <a href="../manage-accounts.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </section>

    <footer>
        <p>© 2024 Your Domain. All rights reserved.</p>
    </footer>
</body>
</html>
