<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Order | Rhine Bikes</title>
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/x-icon" href="mountain-bike.png">
</head>
<body>
	<?php $getOrderByID = getOrderByID($pdo, $_GET['order_id']); ?>
	<h1>Are you sure you want to delete this order?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Order Type: <?php echo $getOrderByID['order_type'] ?></h2>
		<h2>Item Description: <?php echo $getOrderByID['item_description'] ?></h2>
        <h2>Price: <?php echo $getOrderByID['price'] ?></h2>
		<h2>Customer Name: <?php echo $getOrderByID['customer_name'] ?></h2>
		

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?order_id=<?php echo $_GET['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
				<input type="submit" name="deleteOrderBtn" value="Delete">
				<input type="submit" name = "cancelDeleteBtn" value="Cancel">

			</form>			
			
		</div>	

	</div>
</body>
</html>
