<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "electronics";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS electronics";
if ($conn->query($sql) === TRUE) {
    // echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$useTable = "USE electronics";

if($conn->query($useTable) === TRUE){
    // echo "Into electronics Database";
}else{
    echo "Error" . $conn->error;
}

$table = "orders";

// Check if table already exists
$checktable = mysqli_query($conn,"SHOW TABLES LIKE '".$table."'");

if (mysqli_num_rows($checktable) != 1) {
    // Create table
    $sql = "CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    mobile_number VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    payment VARCHAR(255) NOT NULL,
    order_date DATETIME NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        // echo "Table orders created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

}

// Get the form data
$name = $_POST['name'];
$mobile_number = $_POST['mobile_number'];
$email = $_POST['email'];
$address = $_POST['address'];
$payment = $_POST['payment'];

// Validate the form data
if (empty($name) || empty($mobile_number) || empty($email) || empty($address) || empty($payment)) {
    echo "All fields are required";
} else if(!is_numeric($mobile_number) || strlen($mobile_number) !== 10) {
    echo "Mobile number should be valid";
} else {
    // Insert the data into the database
    $sql = "INSERT INTO orders (name, mobile_number, email, address, payment, order_date)
    VALUES ('$name', '$mobile_number', '$email', '$address', '$payment', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
