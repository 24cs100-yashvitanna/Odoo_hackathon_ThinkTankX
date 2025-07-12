<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$conn = new mysqli("localhost", "root", "", "rewear");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'];


$user_sql = "SELECT name, email, location, created_at FROM users WHERE id = $userId";
$user_result = $conn->query($user_sql);
$user = $user_result->fetch_assoc();


$purchase_sql = "SELECT item_name, purchase_date, status FROM purchases WHERE user_id = $userId ORDER BY purchase_date DESC";
$purchases = $conn->query($purchase_sql);

$exchange_sql = "SELECT item_given, item_received, exchange_date, status FROM exchanges WHERE user_id = $userId ORDER BY exchange_date DESC";
$exchanges = $conn->query($exchange_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile – ReWear</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      background-color: #f5f9fc;
      font-family: 'Segoe UI', sans-serif;
      padding: 20px;
    }

    .profile-container {
      max-width: 1000px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #333;
      border-bottom: 2px solid #ccc;
      padding-bottom: 5px;
      margin-top: 30px;
    }

    .user-details {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .user-details div {
      flex: 1 1 45%;
      padding: 10px;
      background-color: #eef4f7;
      border-radius: 8px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #62a8ac;
      color: white;
    }

    .logout-btn {
      float: right;
      margin-top: -40px;
      background-color: #ff4c4c;
      border: none;
      color: white;
      padding: 8px 16px;
      border-radius: 6px;
      cursor: pointer;
    }

    .logout-btn:hover {
      background-color: #e60000;
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
    <form action="logout.php" method="post" style="display:inline;">
      <button class="logout-btn" type="submit">Logout</button>
    </form>

    <h2>User Details</h2>
    <div class="user-details">
      <div><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></div>
      <div><strong>Location:</strong> <?php echo htmlspecialchars($user['location']); ?></div>
      <div><strong>Member Since:</strong> <?php echo htmlspecialchars(date("Y-m-d", strtotime($user['created_at']))); ?></div>
    </div>

    <h2>Purchase History</h2>
    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $purchases->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['item_name']); ?></td>
            <td><?php echo htmlspecialchars($row['purchase_date']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <h2>Exchange History</h2>
    <table>
      <thead>
        <tr>
          <th>Item Given</th>
          <th>Item Received</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $exchanges->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['item_given']); ?></td>
            <td><?php echo htmlspecialchars($row['item_received']); ?></td>
            <td><?php echo htmlspecialchars($row['exchange_date']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
