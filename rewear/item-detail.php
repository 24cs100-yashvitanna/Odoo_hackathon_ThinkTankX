<?php
include 'php/db.php'; // your db connection

if (isset($_GET['id'])) {
    $item_id = intval($_GET['id']); // sanitize input

    $query = "SELECT * FROM items WHERE id = $item_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);
        // display item details
    } else {
        echo "Item not found.";
    }
} else {
    echo "No item selected.";
}
?>
