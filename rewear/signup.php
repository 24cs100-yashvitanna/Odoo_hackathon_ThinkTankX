<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: signup.html");
    exit();
}

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

$check = "SELECT * FROM users WHERE username='$username'";
$res = $conn->query($check);

if ($res->num_rows > 0) {
    echo "❌ Username already exists. <a href='signup.html'>Try another</a>";
} else {
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "✅ Registration successful. <a href='login.html'>Click here to login</a>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}

$conn->close();
?>