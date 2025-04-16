<?php
require_once 'connect.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0): ?>
    <table class="product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price ($)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['category_id'] ?></td>
                    <td><?= htmlspecialchars($row['product_name']) ?></td>
                    <td><?= htmlspecialchars($row['description']) ?></td>
                    <td><?= number_format($row['price'], 2) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No products found.</p>
<?php endif;

$conn->close();
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Categories</title>
    <link rel="stylesheet" href="cate.css">
</head>
<body>
    <h2>Thêm Danh Mục</h2>

    <!-- Hiển thị thông báo -->
    <?php if (!empty($successMessage)): ?>
        <p class="success"><?= $successMessage ?></p>
    <?php endif; ?>
    <?php if (!empty($errorMessage)): ?>
        <p class="error"><?= $errorMessage ?></p>
    <?php endif; ?>

    <form action="add_category.php" method="POST">
        <label for="category_name">Name Data:</label><br>
        <input type="text" id="category_name" name="category_name" required><br><br>

        <label for="description">Disscus:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <input type="submit" value="Thêm">
    </form>
</body>
</html>
