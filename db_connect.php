<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register forms";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
