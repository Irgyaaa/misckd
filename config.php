<?php
$servername = "localhost"; // Hostname, typically 'localhost'
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP (usually empty)
$dbname = "misckd"; // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>