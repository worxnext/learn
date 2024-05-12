<?php
// Database connection
$servername = "localhost"; // Change if your MySQL server is hosted elsewhere
$username = "your_username"; // Your MySQL username
$password = "your_password*"; // Your MySQL password
$dbname = "your_database_name"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$comments = mysqli_real_escape_string($conn, $_POST['comments']);

// Insert data into database
$sql = "INSERT INTO users (name, email, comments) VALUES ('$name', '$email', '$comments')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
