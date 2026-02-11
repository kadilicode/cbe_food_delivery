<?php
include 'config.php';

if(isset($_POST['pay_now'])) {
    $phone = sanitize($_POST['payment_phone']);
    $amount = $_SESSION['total_amount'] ?? 1000;
    $order_id = uniqid('KADILI-', true);

    $orderData = [
        'order_id'    => $order_id,
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
        // Save to DB as Pending
        mysqli_query($conn, "INSERT INTO orders (user_id, order_number, total_amount, payment_method, payment_status) 
        VALUES ('".$_SESSION['user_id']."', '$order_id', '$amount', 'Zenopay', 'Pending')");
        
        echo "<script>alert('Please check your phone for the USSD PIN prompt!'); window.location='orders.php';</script>";
    } else {
        echo "Error: " . ($data['message'] ?? 'Unable to connect to Zenopay');
    }
}
?>