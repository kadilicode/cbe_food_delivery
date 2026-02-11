<?php
include 'config.php';

if(!isset($_SESSION['user_id'])) exit;

$uid = $_SESSION['user_id'];
$amount = $_SESSION['total_amount'];
$order_number = strtoupper(uniqid('KFD'));

// CASE 1: Cash on Delivery
if(isset($_POST['pay_cod'])) {
    $q = "INSERT INTO orders (user_id, order_number, total_amount, payment_method, payment_status, order_status) 
          VALUES ('$uid', '$order_number', '$amount', 'COD', 'Pending', 'Received')";
    if(mysqli_query($conn, $q)) {
        unset($_SESSION['cart']); unset($_SESSION['total_amount']);
        echo "<script>alert('Order Successful! Please prepare cash.'); window.location='orders.php';</script>";
    }
}

// CASE 2: ZenoPay
if(isset($_POST['pay_zenopay'])) {
    $phone = sanitize($_POST['phone']);
    if(empty($phone)) { die("Please enter phone number!"); }

    $orderData = [
        'order_id'    => $order_number,
        'buyer_email' => $_SESSION['email'],
        'buyer_name'  => $_SESSION['full_name'],
        'buyer_phone' => $phone,
        'amount'      => $amount,
    ];

    $ch = curl_init('https://api.zenopay.com/mobile_money_tanzania');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'x-api-key: ' . ZP_API_KEY,
        ],
        CURLOPT_POSTFIELDS     => json_encode($orderData),
    ]);

    $response = curl_exec($ch);
    $data = json_decode($response, true);
    curl_close($ch);

    if (isset($data['status']) && $data['status'] === 'success') {
        mysqli_query($conn, "INSERT INTO orders (user_id, order_number, total_amount, payment_method, payment_status, order_status) 
        VALUES ('$uid', '$order_number', '$amount', 'Zenopay', 'Pending', 'Received')");
        
        unset($_SESSION['cart']); unset($_SESSION['total_amount']);
        echo "<script>alert('USSD Push sent! Enter PIN on your phone.'); window.location='orders.php';</script>";
    } else {
        echo "Payment Error: " . ($data['message'] ?? 'API Connection Failed');
    }
}
?>