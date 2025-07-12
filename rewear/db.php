<?php

$host = "localhost";        // Usually localhost on XAMPP
$dbname = "rewear";         // Your database name
$username = "root";         // XAMPP default username
$password = "";             // XAMPP default has no password

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
