<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");
$conn = new mysqli("localhost", "root", "", "rewear");

$uid = $_SESSION['user_id'];
$u = $conn->query("SELECT name FROM users WHERE id=$uid")->fetch_assoc();
$items = $conn->query("SELECT * FROM items WHERE user_id=$uid");
?>
<h1>Welcome, <?= $u['name'] ?></h1>
<a href="upload.php">Upload Item</a> | <a href="logout.php">Logout</a>
<table>
  <tr><th>Title</th><th>Description</th><th>Status</th></tr>
  <?php while($i = $items->fetch_assoc()): ?>
  <tr>
    <td><?= $i['title'] ?></td>
    <td><?= $i['description'] ?></td>
    <td><?= $i['status'] ?></td>
  </tr>
  <?php endwhile; ?>
</table>
