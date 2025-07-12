<?php
session_start();
$conn = new mysqli("localhost", "root", "", "rewear");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user_id = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $description = $conn->real_escape_string($_POST['description']);
  $size = $conn->real_escape_string($_POST['size']);
  $condition = $conn->real_escape_string($_POST['condition']);
  $status = $conn->real_escape_string($_POST['status']);

  $image_name = "";
  if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $target_dir = "uploads/";
    $image_name = basename($_FILES['image']['name']);
    $target_file = $target_dir . $image_name;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  }

  $sql = "INSERT INTO items (user_id, image, description, size, condition, status) 
          VALUES ('$user_id', '$image_name', '$description', '$size', '$condition', '$status')";
  $conn->query($sql);
}

$items = [];
$sql = "SELECT * FROM items WHERE user_id = $user_id ORDER BY created_at DESC LIMIT 4";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $items[] = $row;
  }
}
?>