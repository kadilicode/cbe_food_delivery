<?php
include 'config.php';

// Ikiwa ni Action ya ADD (Fetch API inatumika hapa)
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    header('Content-Type: application/json');
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error']); exit;
    }
    
    $pid = (int)$_GET['id'];
    if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = []; }
    
    if (isset($_SESSION['cart'][$pid])) { $_SESSION['cart'][$pid]++; } 
    else { $_SESSION['cart'][$pid] = 1; }

    $total_items = 0;
    foreach($_SESSION['cart'] as $qty) { $total_items += $qty; }

    echo json_encode(['status' => 'success', 'total_items' => $total_items]);
    exit;
}

// Ikiwa ni Action ya REMOVE (Link ya kawaida inatumika hapa)
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $pid = (int)$_GET['id'];
    
    if (isset($_SESSION['cart'][$pid])) {
        unset($_SESSION['cart'][$pid]);
    }
    
    // MUHIMU: Rudisha user kwenye ukurasa wa kikapu (Hii inazuia White Screen)
    header("Location: cart.php");
    exit();
}
?>