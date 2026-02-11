<?php include 'config.php'; 
if(!isset($_SESSION['user_id'])) header("Location: login.php");
$uid = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - KADILI FD</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<header>
    <a href="index.php" class="logo-section"><img src="https://i.ibb.co/yF89qDJL/image-removebg-preview.webp" height="35"><h1>KADILI FD</h1></a>
</header>

<div class="container">
    <h2>Order History</h2>
    <?php
    $res = mysqli_query($conn, "SELECT * FROM orders WHERE user_id=$uid ORDER BY id DESC");
    if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            echo "
            <div class='card'>
                <p><b>Order #:</b> {$row['order_number']}</p>
                <p><b>Amount:</b> Tsh ".number_format($row['total_amount'])."</p>
                <p><b>Status:</b> <span style='color:var(--primary)'>{$row['order_status']}</span></p>
            </div>";
        }
    } else {
        echo "<p>No orders found.</p>";
    }
    ?>
</div>

<nav class="bottom-nav">
    <a href="index.php"><i class="fa fa-home"></i>Home</a>
    <a href="cart.php"><i class="fa fa-shopping-basket"></i>Basket</a>
    <a href="orders.php" class="active"><i class="fa fa-receipt"></i>Orders</a>
    <a href="profile.php"><i class="fa fa-user"></i>Profile</a>
</nav>
</body>
</html>