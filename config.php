<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "kadili_food_db");

// ZenoPay Config
define('ZP_API_KEY', 'your API');
define('ZP_BASE_URL', 'https://api.zenopay.com');

function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}
?>
