<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="indexstyle.css">
    <title>Rhine Bikes</title>
	<link rel="icon" type="image/x-icon" href="mountain-bike.png">
</head>
<body>
<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
	<?php } unset($_SESSION['message']); ?>



	<?php if (isset($_SESSION['username'])) { ?>
		<h1>Welcome! <?php echo $_SESSION['username']; ?></h1>
		<a href="core/handleForms.php?logoutAUser=1">Logout</a>
	<?php } else { echo "<h1>No user logged in</h1>";}?>

	<h2>Welcome to Rhine Bikes Customer Registration</h2>
    <form action="core/handleForms.php" method="POST">
        <label for="first_name">First Name:</label><br>
        <input type="text" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label><br>
        <input type="text" name="last_name" required><br><br>

        <label for="date_of_birth">Date of Birth:</label><br>
        <input type="date" name="date_of_birth"><br><br>
        
        <label for="email_add">Email:</label><br>
        <input type="email" name="email_add" required><br><br>
        
        <label for="contact_number">Contact Number:</label><br>
        <input type="text" name="contact_number" required><br><br>
        <input type="submit" name="insertNewCustomerBtn">
    
    </form>

	<?php $getAllCustomer = getAllCustomer($pdo); ?>
	<?php foreach ($getAllCustomer as $row) { ?>
    
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>First Name: <?php echo $row['first_name']; ?></h3>
		<h3>Last Name: <?php echo $row['last_name']; ?></h3>
        <h3>Date of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Email: <?php echo $row['email_add']; ?></h3>
		<h3>Contact Number: <?php echo $row['contact_number']; ?></h3>
		<h3>Registration Date: <?php echo $row['registration_date']; ?></h3>

        <div class="editAndDelete" style="float: right; margin-right: 20px;">
            <a href="viewOrders.php?customer_id=<?php echo $row['customer_id'];?>">View Orders</a>
            <a href="editCustomer.php?customer_id=<?php echo $row['customer_id'];?>">Edit</a>
            <a href="deleteCustomer.php?customer_id=<?php echo $row['customer_id'];?>">Delete</a>
        </div>
	</div> 
	<?php } ?>


</body>
</html>