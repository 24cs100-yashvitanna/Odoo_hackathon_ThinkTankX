<?php
session_start();
$conn = new mysqli("localhost", "root", "", "rewear");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($id, $name, $hashed, $role);
  $stmt->fetch();

  if ($stmt->num_rows > 0 && password_verify($password, $hashed)) {
    $_SESSION['user_id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['role'] = $role;
    header("Location: dashboard.php");
  } else {
    echo "Invalid credentials.";
  }
}
?>
