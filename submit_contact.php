<?php
// Database connection (replace with your credentials)
$servername = "localhost";
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "website"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo 'error'; // Return error if connection fails
    exit;
}

// Get the form data
$name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
$email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
$message = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';

// Validate the data
if (empty($name) || empty($email) || empty($message)) {
    echo 'error'; // Return error if any field is empty
    exit;
}

// Insert the data into the database
$sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo 'success'; // Return success response if insertion succeeds
} else {
    echo 'error'; // Return error response if insertion fails
}

$conn->close();
?>
