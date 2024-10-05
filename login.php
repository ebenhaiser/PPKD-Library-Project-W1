<?php
    session_start();
    session_regenerate_id();

    if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
        header('Location: dashboard.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

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

    <section id="login" class="login h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5 user-photo">
						<img src="assets/img/user.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Lo gin</h1>
							<form method="POST" action="controller/login-control.php" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
										<a href="forgot.html" class="float-end">
											Forgot Password?
										</a>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Remember Me</label>
									</div>
									<button type="submit" name="login" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="register.php" class="text-dark">Create One</a>
							</div>
						</div>
					</div>
                    </br>
                    </br>
				</div>
			</div>
		</div>
	</section>

    <footer>
        <p>© 2024 Your Domain. All rights reserved.</p>
    </footer>
</body>
</html>
