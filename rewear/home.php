<?php
$conn = new mysqli("localhost", "root", "", "rewear");
$items = $conn->query("SELECT * FROM items WHERE status = 'approved'");
while ($item = $items->fetch_assoc()):
?>
<div class="product-card">
  <img src="uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
  <h3><?= htmlspecialchars($item['title']) ?></h3>
  <p>Size: <?= $item['size'] ?> | Condition: <?= $item['condition'] ?></p>
  <div class="btn-group">
    <a href="item-detail.php?id=<?= $item['id'] ?>" class="btn">Swap</a>
    <a href="redeem.php?id=<?= $item['id'] ?>" class="btn">Redeem</a>
  </div>
</div>
<?php endwhile; ?>
