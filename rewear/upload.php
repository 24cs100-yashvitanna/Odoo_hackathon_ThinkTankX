<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");
$conn = new mysqli("localhost", "root", "", "rewear");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid = $_SESSION['user_id'];
    $title = $conn->real_escape_string($_POST['title']);
    $desc = $conn->real_escape_string($_POST['description']);
    $cat = $conn->real_escape_string($_POST['category']);

    $conn->query("INSERT INTO items (user_id, title, description, category) VALUES ($uid, '$title', '$desc', '$cat')");
    header("Location: dashboard.php");
}
?>

<form method="POST">
  <input name="title" placeholder="Item Title" required />
  <textarea name="description" placeholder="Description"></textarea>
  <select name="category">
    <option>Shirts</option><option>Pants</option><option>Winterwear</option>
  </select>
  <button type="submit">Upload</button>
</form>
