<?php include 'header.php'; 
if(!isset($_SESSION['user_id'])) header("Location: login.php");
?>

<div class="container">
    <h2 style="margin-bottom:20px;">Your Basket <i class="fa fa-shopping-basket"></i></h2>
    <div class="card">
        <?php
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $total = 0;
            foreach($_SESSION['cart'] as $id => $qty) {
                $res = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
                $item = mysqli_fetch_assoc($res);
                $sub = $item['price'] * $qty; $total += $sub;
                echo "
                <div class='item-row'>
                    <div class='item-info'>
                        <h4>{$item['name']}</h4>
                        <small>Qty: $qty x ".number_format($item['price'])."</small>
                    </div>
                    <div style='display:flex; align-items:center; gap:15px;'>
                        <b>".number_format($sub)."</b>
                        <a href='cart_logic.php?action=remove&id=$id' class='remove-btn'><i class='fa fa-times-circle'></i></a>
                    </div>
                </div>";
            }
            $_SESSION['total_amount'] = $total;
            echo "<h3 style='margin-top:20px;'>Total: Tsh ".number_format($total)."</h3>";
            echo "<a href='checkout.php' class='btn-main' style='margin-top:15px;'>Proceed to Checkout</a>";
        } else {
            echo "<p style='text-align:center; padding:20px;'>Your basket is empty.</p>";
            echo "<a href='index.php' class='btn-main' style='background:#888;'>Back to Menu</a>";
        }
        ?>
    </div>
</div>

<?php include 'footer_nav.php'; ?>