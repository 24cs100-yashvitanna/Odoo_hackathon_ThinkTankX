<?php
session_start();
$conn = new mysqli("localhost", "root", "", "rewear");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm = $_POST['confirm'];

if (empty($name) || empty($email) || empty($password) || empty($confirm)) {
    die("All fields are required.");
}

if ($password !== $confirm) {
    die("Passwords do not match.");
}

$sql = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Email already registered. <a href='login.html'>Login here</a>";
    $stmt->close();
    $conn->close();
    exit();
}
$stmt->close();
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$insert = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($insert);
$stmt->bind_param("sss", $name, $email, $hashed_password);

if ($stmt->execute()) {
    header("Location: login.html");
    exit();
} else {
    echo "Registration failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
