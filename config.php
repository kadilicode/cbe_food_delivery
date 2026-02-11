<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "kadili_food_db");

// ZenoPay Config
define('ZP_API_KEY', 'CR3eQVBuusoIF0vBTAyaKx5XnMmEwBI49zFPcpqqk3aZeV0ISW25l2DaFWcFJOvl_J1YJRcEKYoSdlZ8ZIa26Q');
define('ZP_BASE_URL', 'https://api.zenopay.com');

function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}
?>