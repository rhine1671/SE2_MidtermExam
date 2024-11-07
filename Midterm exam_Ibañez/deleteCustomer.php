<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Customer | Rhine Bikes</title>
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/x-icon" href="mountain-bike.png">
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getCustomerByID = getCustomerByID($pdo, $_GET['customer_id']); ?>
	<form action="core/handleForms.php?customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">

		<div class="customerContainer" style="border-style: solid; 
		font-family: 'Arial';">
			<p>First Name: <?php echo $getCustomerByID['first_name']; ?></p>
			<p>Last Name: <?php echo $getCustomerByID['last_name']; ?></p>
			<p>Date of Birth: <?php echo $getCustomerByID['date_of_birth']; ?></p>
            <p>Email: <?php echo $getCustomerByID['email_add']; ?></p>
			<p>Contact Number: <?php echo $getCustomerByID['contact_number']; ?></p>
			<input type="submit" name="deleteCustomerBtn" value="Delete">
			<input type="submit" name = "cancelBtn" value="Cancel">
		</div>
	</form>
</body>
</html>