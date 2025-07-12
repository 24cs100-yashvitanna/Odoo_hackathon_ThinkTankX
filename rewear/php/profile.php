<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html");
    exit();
}

$conn = new mysqli("localhost", "root", "", "rewear");
$userId = $_SESSION['user_id'];

// Fetch user details
$user = $conn->query("SELECT name, email, location, created_at FROM users WHERE id = $userId")->fetch_assoc();

// Purchases
$purchases = $conn->query("SELECT title, created_at FROM items WHERE buyer_id = $userId");

// Exchanges
$exchanges = $conn->query("
  SELECT i.title, e.partner_name, e.exchanged_at 
  FROM exchanges e 
  JOIN items i ON e.item_id = i.id 
  WHERE e.user_id = $userId
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Profile - ReWear</title>
  <link rel="stylesheet" href="../style.css" />
  <style>
    .profile-container {
      max-width: 1000px;
      margin: 30px auto;
      display: flex;
      gap: 20px;
    }

    .sidebar {
      background-color: #62a8ac;
      color: white;
      padding: 20px;
      border-radius: 10px;
      width: 250px;
    }

    .content {
      flex-grow: 1;
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .history-section {
      margin-top: 20px;
    }

    .history-item {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }

    .footer {
      text-align: center;
      margin-top: 40px;
      color: #888;
      font-size: 0.9rem;
      padding: 20px;
    }
  </style>
</head>
<body>
  <header style="background-color: #62a8ac; color: white; text-align: center; padding: 20px;">
    <h1>👤 ReWear – My Profile</h1>
  </header>

  <div class="profile-container">
    <div class="sidebar">
      <h2>Welcome, <?= htmlspecialchars($user['name']) ?></h2>
      <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
      <p><strong>Location:</strong> <?= htmlspecialchars($user['location'] ?? 'Not Set') ?></p>
      <p><strong>Member since:</strong> <?= date("M Y", strtotime($user['created_at'])) ?></p>
    </div>

    <div class="content">
      <h3>Purchase History</h3>
      <div class="history-section">
        <?php if ($purchases->num_rows > 0): ?>
          <?php while ($row = $purchases->fetch_assoc()): ?>
            <div class="history-item">
              👕 <strong><?= htmlspecialchars($row['title']) ?></strong> — <?= date("d-M-Y", strtotime($row['created_at'])) ?>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>No purchases yet.</p>
        <?php endif; ?>
      </div>

      <h3 style="margin-top: 30px;">Exchange History</h3>
      <div class="history-section">
        <?php if ($exchanges->num_rows > 0): ?>
          <?php while ($row = $exchanges->fetch_assoc()): ?>
            <div class="history-item">
              🔁 <strong><?= htmlspecialchars($row['title']) ?></strong> exchanged with <?= htmlspecialchars($row['partner_name']) ?> (<?= date("M Y", strtotime($row['exchanged_at'])) ?>)
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>No exchanges yet.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <footer class="footer">
    &copy; 2025 ReWear Community
  </footer>
</body>
</html>
