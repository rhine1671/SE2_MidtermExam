<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | Rhine Bikes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="loginstyle.css">
	<link rel="icon" type="image/x-icon" href="mountain-bike.png">
</head>
<body>
<div class="container">
    <h1>Welcome to Rhine Bikes Registration Portal</h1>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert"><?php echo $_SESSION['message']; ?></div>
    <?php } unset($_SESSION['message']); ?>
    <form action="core/handleForms.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <button type="submit" name="registerUserBtn" class="btn btn-primary">Register</button>
    </form>
</div>
</body>
</html>
