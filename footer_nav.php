<nav class="bottom-nav">
    <a href="index.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
        <i class="fa fa-home"></i>Home
    </a>
    <a href="cart.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'cart.php') ? 'active' : ''; ?>">
        <i class="fa fa-shopping-basket"></i>Basket
        <span class="badge cart-count-global"><?php echo $initial_count; ?></span>
    </a>
    <a href="orders.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'orders.php') ? 'active' : ''; ?>">
        <i class="fa fa-receipt"></i>Orders
    </a>
    <a href="profile.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'profile.php') ? 'active' : ''; ?>">
        <i class="fa fa-user"></i>Profile
    </a>
</nav>

<footer style="text-align:center; padding: 20px; color:#888; font-size:12px; margin-bottom:80px;">
    KADILI FOOD DELIVERY &copy; 2026 | Created by Kadili Dev
</footer>