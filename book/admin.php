<?php
require_once 'connect.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE product_id = $id");
    header("Location: product_list.php");
    exit();
}

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Management</title>
    <style>
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #333; color: white; }
        a.button { padding: 5px 10px; background: #3498db; color: white; text-decoration: none; border-radius: 5px; }
        a.button.delete { background: #e74c3c; }
    </style>
</head>
<body>

    <h2>Product List</h2>
    <a href="add_product.php" class="button">Add Product</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Category ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['product_id'] ?></td>
            <td><?= $row['category_id'] ?></td>
            <td><?= htmlspecialchars($row['product_name']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td>$<?= number_format($row['price'], 2) ?></td>
            <td>
                <a href="edit_product.php?id=<?= $row['product_id'] ?>" class="button">Edit</a>
                <a href="product_list.php?delete=<?= $row['product_id'] ?>" class="button delete" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
