<?php
session_start();
if (!$_SESSION['is_admin']) header("Location: dashboard.php");
$conn = new mysqli("localhost", "root", "", "rewear");

if (isset($_GET['action'], $_GET['id'])) {
    $id = intval($_GET['id']);
    $act = $_GET['action'];
    if ($act == "approve") $conn->query("UPDATE items SET status='approved' WHERE id=$id");
    if ($act == "reject") $conn->query("UPDATE items SET status='rejected' WHERE id=$id");
    if ($act == "delete") $conn->query("DELETE FROM items WHERE id=$id");
    header("Location: admin-panel.php");
    exit;
}

$q = $conn->query("SELECT items.*, users.email FROM items JOIN users ON items.user_id = users.id WHERE status='pending'");
?>

<h1>Admin Panel</h1>
<a href="logout.php">Logout</a>
<table>
  <tr><th>Title</th><th>User</th><th>Description</th><th>Category</th><th>Action</th></tr>
  <?php while($r = $q->fetch_assoc()): ?>
  <tr>
    <td><?= $r['title'] ?></td>
    <td><?= $r['email'] ?></td>
    <td><?= $r['description'] ?></td>
    <td><?= $r['category'] ?></td>
    <td>
      <a href="?action=approve&id=<?= $r['id'] ?>">Approve</a>
      <a href="?action=reject&id=<?= $r['id'] ?>">Reject</a>
      <a href="?action=delete&id=<?= $r['id'] ?>">Delete</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
