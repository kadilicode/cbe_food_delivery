<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KADILI FD | CBE</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header>
    <a href="index.php" class="logo-section">
        <img src="https://i.ibb.co/yF89qDJL/image-removebg-preview.webp" alt="CBE Logo">
        <h1>KADILI FD</h1>
    </a>

    <!-- Menu ya Desktop -->
    <ul class="nav-desktop">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="about.php#services">Services</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="cart.php">Basket (<span class="cart-count-global"><?php echo $initial_count; ?></span>)</a></li>
            <li><a href="logout.php" style="color:red">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
    </ul>

    <!-- Menu Button ya Kulia (Inaonekana Kila Page kwa walio Login & Kwenye Index pekee kwa wageni) -->
    <div style="display:flex; gap:15px; align-items:center;">
        <?php if(isset($_SESSION['user_id']) || basename($_SERVER['PHP_SELF']) == 'index.php'): ?>
            <a href="cart.php" class="nav-mobile-cart" style="color:var(--dark); position:relative;">
                <i class="fa fa-shopping-basket" style="font-size:20px;"></i>
                <span class="badge cart-count-global"><?php echo $initial_count; ?></span>
            </a>
            <i class="fa fa-bars" id="menuBtn" style="font-size: 24px; cursor: pointer; color: var(--dark);"></i>
        <?php endif; ?>
    </div>
</header>

<!-- Sidebar Menu (Mobile Only) -->
<div class="sidebar-overlay" id="overlay"></div>
<div class="sidebar" id="sidebar">
    <div style="text-align:right; margin-bottom:20px;">
        <i class="fa fa-times" id="closeBtn" style="font-size:24px; cursor:pointer; color:var(--primary);"></i>
    </div>
    <div style="text-align:center; margin-bottom:30px;">
        <img src="https://i.ibb.co/yF89qDJL/image-removebg-preview.webp" width="70">
        <h3 style="color:var(--primary); margin-top:10px;">KADILI FD</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="about.php"><i class="fa fa-info-circle"></i> About Us</a></li>
        <li><a href="about.php#services"><i class="fa fa-concierge-bell"></i> Services</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="orders.php"><i class="fa fa-receipt"></i> My Orders</a></li>
            <li><a href="profile.php"><i class="fa fa-user"></i> My Profile</a></li>
            <li><a href="logout.php" style="color:red;"><i class="fa fa-power-off"></i> Logout</a></li>
        <?php else: ?>
            <li><a href="login.php"><i class="fa fa-sign-in-alt"></i> Login</a></li>
            <li><a href="register.php"><i class="fa fa-user-plus"></i> Sign Up</a></li>
        <?php endif; ?>
    </ul>
</div>

<script>
const menuBtn = document.getElementById('menuBtn');
const closeBtn = document.getElementById('closeBtn');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

if(menuBtn) {
    menuBtn.onclick = () => { sidebar.classList.add('active'); overlay.classList.add('active'); }
    closeBtn.onclick = () => { sidebar.classList.remove('active'); overlay.classList.remove('active'); }
    overlay.onclick = () => { sidebar.classList.remove('active'); overlay.classList.remove('active'); }
}
</script>