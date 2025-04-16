<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
