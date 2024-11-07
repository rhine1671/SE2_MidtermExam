<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Rhine Bikes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="loginstyle.css">
	<link rel="icon" type="image/x-icon" href="mountain-bike.png">
</head>
<body>
<div class="container">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert"><?php echo $_SESSION['message']; ?></div>
    <?php } unset($_SESSION['message']); ?>
    <h1>Rhine Bikes User Login</h1>
    <form action="core/handleForms.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" name="loginUserBtn" class="btn btn-primary">Login</button>
    </form>
    <p class="mt-3">Don't have an account? You may register <a href="register.php">here</a></p>
</div>
</body>
</html>
