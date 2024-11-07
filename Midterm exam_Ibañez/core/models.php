<?php  

function insertNewUser($pdo, $username, $password, $first_name, $last_name) {

	$checkUserSQL = "SELECT * FROM user_passwords WHERE username = ?";
	$checkUserSQLStmt = $pdo->prepare($checkUserSQL);
	$checkUserSQLStmt->execute([$username]);

	if ($checkUserSQLStmt->rowCount() == 0) {
		$sql = "INSERT INTO user_passwords (username, password, first_name, last_name) VALUES (?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$username, $password, $first_name, $last_name]);

		if ($executeQuery) {
			$_SESSION['message'] = "User successfully inserted!";
			return true;
		}

		else {
			$_SESSION['message'] = "An error occured from our query!";
		}
	}

	else {
		$_SESSION['message'] = "User already exists!";
	}

}

function loginUser($pdo, $username, $password) {

	$sql = "SELECT * FROM user_passwords WHERE username = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username]);

	if ($executeQuery) {
		$userInfoRow = $stmt->fetch();
		$usernameFromDB = $userInfoRow['username'];
		$passwordFromDB = $userInfoRow['password'];

		if ($password == $passwordFromDB) {
			$_SESSION['username'] = $usernameFromDB;
			$_SESSION['message'] = "Login is successful!";
			return true;
		}

		else {
			$_SESSION['message'] = "Passwords don't match!";
		}

	}

	if ($stmt->rowCount() == 0) {
		$_SESSION['message'] = "User is not yet registered!";
	}

}

function getAllUsers($pdo) {
	$sql = "SELECT * FROM user_passwords";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM user_passwords WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$user_id]);

	if ($executeQuery) {
		return $stmt->fetch();		
	}
}


function insertShopCustomer($pdo, $first_name, $last_name,$date_of_birth, $email_add, $contact_number) {

	$sql = "INSERT INTO customers_acc (first_name, last_name, date_of_birth, email_add, contact_number) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $email_add, $contact_number]);

	if ($executeQuery) {
		return true;
	}
}

function getAllCustomer($pdo){
    $sql  = "SELECT * FROM customers_acc";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getCustomerByID($pdo, $customer_id) {
    $sql = "SELECT * FROM customers_acc WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$customer_id])) {
        return $stmt->fetch();
    }
 }


function updateCustomer($pdo, $customer_id, $first_name, $last_name, $date_of_birth, $email_add, $contact_number) {

    $sql = "UPDATE customers_acc
				SET first_name = ?, 
					last_name = ?,  
					date_of_birth = ?,
                    email_add = ?, 
					contact_number = ? 
                WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $email_add, $contact_number, $customer_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteCustomer($pdo, $customer_id) {

	$sql = "DELETE FROM customers_acc WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$customer_id]);

	if ($executeQuery) {
		return true;
	}

}

function getOrderByCustomer($pdo, $customer_id){
    $sql  = "SELECT 
		orders_acc.order_id AS order_id, 
		orders_acc.order_date AS order_date,
		orders_acc.order_type AS order_type,
		orders_acc.item_description AS item_description,
		orders_acc.price AS price,
		orders_acc.last_updated AS last_updated,
		CONCAT(customers_acc.first_name, ' ', customers_acc.last_name) AS customer_name,
		CONCAT(user_passwords.first_name, ' ', user_passwords.last_name) AS added_by
		FROM 
			orders_acc 
		JOIN 
			customers_acc ON orders_acc.customer_id = customers_acc.customer_id
		LEFT JOIN 
			user_passwords ON orders_acc.user_id = user_passwords.user_id
		WHERE 
			orders_acc.customer_id = ?
		ORDER BY 
			orders_acc.order_date;";
    
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$customer_id]);

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getAllInfoByID($pdo, $customer_id) {
    $sql = "SELECT * FROM customers_acc WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$customer_id])) {
        return $stmt->fetch();
        }
    }

function insertOrder($pdo, $order_type, $item_description, $price, $customer_id, $user_id) {

	$sql = "INSERT INTO orders_acc (order_type, item_description, price, customer_id, user_id) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_type, $item_description, $price, $customer_id, $user_id]);

	if ($executeQuery) {
		return true;
	}
}

function getAllOrder($pdo){
    $sql  = "SELECT * FROM orders_acc";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getOrderByID($pdo, $order_id){
    $sql  = "SELECT  orders_acc.order_id AS order_id,
        orders_acc.order_date AS order_date,
        orders_acc.order_type AS order_type,
        orders_acc.item_description AS item_description,
        orders_acc.price AS price,
        CONCAT(customers_acc.first_name, ' ',customers_acc.last_name) AS customer_name,
		CONCAT(user_passwords.first_name, ' ', user_passwords.last_name) AS added_by
        FROM orders_acc 
        JOIN customers_acc ON orders_acc.customer_id = customers_acc.customer_id
		LEFT JOIN user_passwords ON orders_acc.user_id = user_passwords.user_id
        WHERE orders_acc.order_id = ?
        GROUP BY orders_acc.order_type;";
    
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$order_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function updateOrder($pdo, $order_type, $item_description, $price, $order_id) {

    $sql = "UPDATE orders_acc
				SET order_type = ?, 
					item_description = ?,  
					price = ?,
					last_updated = NOW()
                WHERE order_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$order_type, $item_description, $price, $order_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteOrder($pdo, $order_id) {

	$sql = "DELETE FROM orders_acc WHERE order_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$order_id]);

	if ($executeQuery) {
		return true;
	}

}




?>