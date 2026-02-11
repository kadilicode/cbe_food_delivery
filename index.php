<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KADILI FD | CBE Campus Food</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- Header Area -->
<header>
    <a href="index.php" class="logo-section">
        <img src="https://i.ibb.co/yF89qDJL/image-removebg-preview.webp" alt="CBE Logo">
        <h1>KADILI FD</h1>
    </a>

    <!-- Desktop Nav -->
    <ul class="nav-desktop">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="cart.php">Basket (<span class="cart-count-global"><?php echo $initial_count; ?></span>)</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="logout.php" style="color:var(--primary)">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
    </ul>

    <!-- Mobile Icons -->
    <div style="display:flex; gap:18px; align-items:center;">
        <a href="cart.php" class="nav-mobile-cart" style="color:var(--dark); position:relative;">
            <i class="fa fa-shopping-basket" style="font-size:20px;"></i>
            <span class="badge cart-count-global"><?php echo $initial_count; ?></span>
        </a>
        <i class="fa fa-bars" id="menuBtn" style="font-size: 22px; cursor: pointer;"></i>
    </div>
</header>

<!-- Sidebar & Overlay -->
<div class="sidebar-overlay" id="overlay"></div>
<div class="sidebar" id="sidebar">
    <div style="text-align:right;"><i class="fa fa-times" id="closeBtn" style="font-size:24px; cursor:pointer; color:var(--primary);"></i></div>
    <div style="text-align:center; margin-bottom:20px;">
        <img src="https://i.ibb.co/yF89qDJL/image-removebg-preview.webp" width="60">
        <h3 style="color:var(--primary); margin-top:10px;">KADILI FD</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="about.php"><i class="fa fa-info-circle"></i> About Us</a></li>
        <li><a href="about.php#services"><i class="fa fa-concierge-bell"></i> Our Services</a></li>
        <li><a href="orders.php"><i class="fa fa-receipt"></i> My Orders</a></li>
        <li><a href="profile.php"><i class="fa fa-user"></i> My Profile</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="logout.php" style="color:red;"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        <?php else: ?>
            <li><a href="login.php"><i class="fa fa-sign-in-alt"></i> Login</a></li>
        <?php endif; ?>
    </ul>
</div>

<!-- Main Content -->
<div class="container">
    <div style="text-align:center; padding: 20px 0 10px;">
        <h2 style="font-weight: 800; font-size: 1.4rem;">Delicious CBE Menu</h2>
        <p style="font-size:13px; color:#777;">Fresh meals delivered to your room.</p>
    </div>

    <div class="food-grid">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM products");
        while($row = mysqli_fetch_assoc($res)) {
            echo "
            <div class='card'>
                <img src='images/{$row['image']}' onerror='this.src=\"images/placeholder.jpg\"'>
                <h4>{$row['name']}</h4>
                <span class='price'>Tsh ".number_format($row['price'])."</span>
                <button class='btn-main' onclick='addToCart({$row['id']})'>
                    <i class='fa fa-cart-plus'></i> Add
                </button>
            </div>";
        }
        ?>
    </div>
</div>

<!-- Bottom Nav for Mobile -->
<nav class="bottom-nav">
    <a href="index.php" class="active"><i class="fa fa-home"></i>Home</a>
    <a href="cart.php">
        <i class="fa fa-shopping-basket"></i>Basket
        <span class="badge cart-count-global"><?php echo $initial_count; ?></span>
    </a>
    <a href="orders.php"><i class="fa fa-receipt"></i>Orders</a>
    <a href="profile.php"><i class="fa fa-user"></i>Profile</a>
</nav>

<script>
// Sidebar Toggle Logic
const menuBtn = document.getElementById('menuBtn');
const closeBtn = document.getElementById('closeBtn');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

menuBtn.onclick = () => { sidebar.classList.add('active'); overlay.classList.add('active'); }
closeBtn.onclick = () => { sidebar.classList.remove('active'); overlay.classList.remove('active'); }
overlay.onclick = () => { sidebar.classList.remove('active'); overlay.classList.remove('active'); }

// Fetch API Add to Cart
function addToCart(pid) {
    fetch('cart_logic.php?action=add&id=' + pid)
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success') {
            document.querySelectorAll('.cart-count-global').forEach(el => el.innerText = data.total_items);
        } else {
            window.location.href = 'login.php';
        }
    });
}
</script>

</body>
</html>