<?php include 'config.php'; 
if(!isset($_SESSION['user_id']) || !isset($_SESSION['total_amount'])) header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - KADILI FD</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container" style="max-width:500px;">
    <div class="card">
        <h2 style="text-align:center; color:var(--primary); margin-bottom:20px;">Checkout</h2>
        <p>Total to Pay: <b>Tsh <?php echo number_format($_SESSION['total_amount']); ?></b></p>
        
        <form action="process_order.php" method="POST">
            <h4 style="margin-top:20px;">1. Pay with Zenopay (Instant)</h4>
            <div class="payment-logos">
                <img src="https://i.ibb.co/5Xmzv2kq/M-pesa-logo-removebg-preview.webp" title="M-Pesa">
                <img src="https://i.ibb.co/FLQ2MVxQ/mixx-logo-removebg-preview.webp" title="Tigo Pesa">
                <img src="https://i.ibb.co/zVJrmYn1/images-removebg-preview.webp" title="Airtel Money">
                <img src="https://i.ibb.co/S4mp6TbX/applications-system-removebg-preview.webp" title="Halopesa">
            </div>
            <input type="text" name="phone" placeholder="Enter Mobile Number (07... / 06...)" >
            <button type="submit" name="pay_zenopay" class="btn-main">Pay via USSD Push</button>

            <div style="text-align:center; margin:15px 0; color:#888;">— OR —</div>

            <h4>2. Cash on Delivery</h4>
            <p style="font-size:12px; color:#666;">Pay only when the food arrives at your room.</p>
            <button type="submit" name="pay_cod" class="btn-main btn-cod">Order with Cash on Delivery</button>
        </form>
    </div>
</div>
</body>
</html>