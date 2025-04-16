<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['category_id'];
    $product_name = trim($_POST['product_name']);
    $description = trim($_POST['description']);
    $price = $_POST['price'];

    // Prepared statement to insert data
    $stmt = $conn->prepare("INSERT INTO products (category_id, product_name, description, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $category_id, $product_name, $description, $price);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Product</title>
    <style>
        body { font-family: Arial; padding: 40px; background: #f9f9f9; }
        form { background: #fff; padding: 20px; border-radius: 10px; max-width: 400px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type=submit] { background: #2c3e50; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Add New Product</h2>
    <form method="POST" action="">
        <label>Category ID:</label>
        <input type="number" name="category_id" required>

        <label>Product Name:</label>
        <input type="text" name="product_name" required>

        <label>Description:</label>
        <textarea name="description" required></textarea>

        <label>Price:</label>
        <input type="number" name="price" step="0.01" required>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>
