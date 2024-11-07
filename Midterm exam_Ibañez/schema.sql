CREATE TABLE user_passwords (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE customers_acc (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    date_of_birth VARCHAR (50),
    email_add VARCHAR(100),
    contact_number VARCHAR(20),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders_acc (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    order_type VARCHAR(50),
    item_description VARCHAR(255),
    price DECIMAL,
    user_id INT,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
