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

// Get form data
$issue = isset($_POST['issue']) ? $conn->real_escape_string($_POST['issue']) : '';
$details = isset($_POST['details']) ? $conn->real_escape_string($_POST['details']) : '';

// Validate data
if (empty($issue) || empty($details)) {
    echo 'error'; // Return error if any field is empty
    exit;
}

// Insert data into database
$sql = "INSERT INTO service_issues (issue, details) VALUES ('$issue', '$details')";

if ($conn->query($sql) === TRUE) {
    echo 'success'; // Return success message
} else {
    echo 'error'; // Return error message if the query fails
}

// Close connection
$conn->close();
?>
