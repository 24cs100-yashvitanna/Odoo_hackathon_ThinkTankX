<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "userdb";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: home.html");
    exit();
} else {
    echo "❌ Invalid username or password. <a href='login.html'>Try again</a>";
}

$conn->close();
?>