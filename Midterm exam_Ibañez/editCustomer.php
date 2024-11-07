<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Customer | Rhine Bikes</title>
	<link rel="stylesheet" href="indexstyle.css">
	<link rel="icon" type="image/x-icon" href="mountain-bike.png">

</head>
<body>
	<?php $getCustomerByID = getCustomerByID($pdo, $_GET['customer_id']); ?>
	<form action="core/handleForms.php" method="POST">
        <input type="hidden" name="customer_id" value="<?php echo $getCustomerByID['customer_id']; ?>">
		<p>
			<label for= "first_name">First Name: </label> 
			<input type="text" name="first_name" value="<?php echo $getCustomerByID['first_name']; ?>">
		</p>
		<p>
			<label for="last_name">Last Name: </label> 
			<input type="text" name="last_name" value="<?php echo $getCustomerByID['last_name']; ?>">
		</p>
		<p>
			<label for="date_of_birth">Date of Birth: </label>
			<input type="date" name="date_of_birth" value="<?php echo $getCustomerByID['date_of_birth']; ?>">
		</p>
        <p>
			<label for="email_add">Email: </label>
			<input type="text" name="email_add" value="<?php echo $getCustomerByID['email_add']; ?>"></p>
		<p>
			<label for="contact_number">Contact Number: </label>
			<input type="text" name="contact_number" value="<?php echo $getCustomerByID['contact_number']; ?>"></p>
            <input type="submit" name="editCustomerBtn">
			<input type="submit" name = "cancelBtn" value="Cancel">
	</form>
</body>
</html>