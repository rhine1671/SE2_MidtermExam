<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Orders | Rhine Bikes</title>
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/x-icon" href="mountain-bike.png">
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $getAllInfoByID = getAllInfoByID($pdo, $_GET['customer_id']); ?>
	<h1>Name: <?php echo $getAllInfoByID['first_name']. ' '. $getAllInfoByID['last_name']; ?></h1>
	<h1>Order Details:</h1>
	<form action="core/handleForms.php?customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
        
        <label for="order_type">Order Type:</label><br>
        <select id="order_type" name="order_type" required>
            <option value="Sale">Sale</option>
            <option value="Repair">Repair</option>
            <option value="Accessory">Accessory</option>
        </select><br><br>
        
        <label for="item_description">Item Description:</label><br>
        <input type="text" id="item_description" name="item_description" required><br><br>
        
        <label for="price">Price:</label><br>
        <input type="number" step="0.01" name="price" required><br><br>
        
        <input type="submit" name="insertNewOrderBtn">
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Order ID</th>
	    <th>Order Date</th>
	    <th>Order Type</th>
		<th>Item Description</th>
		<th>Price</th>
	    <th>Customer Name</th>
		<th>Last Updated</th>
	    <th>Action</th>
	  </tr>
	  
	  <?php $getOrderByCustomer = getOrderByCustomer($pdo, $_GET['customer_id']); ?>
	  <?php foreach ($getOrderByCustomer as $row) { 
		?>
	  <tr>
	  	<td><?php echo $row['order_id']; ?></td>
        <td><?php echo $row['order_date']; ?></td>	  	
	  	<td><?php echo $row['order_type']; ?></td>	  	
	  	<td><?php echo $row['item_description']; ?></td>	  	
	  	<td><?php echo $row['price']; ?></td>	  	
        <td><?php echo $row['customer_name']; ?></td>	
		<td><?php echo $row['last_updated']; ?></td>
	  	
	  	<td>
	  		<a href="editOrder.php?order_id=<?php echo $row['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>">Edit</a>

	  		<a href="deleteOrder.php?order_id=<?php echo $row['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>