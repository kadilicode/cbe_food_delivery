<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | KADILI FD</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- Link ya main css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- INTERNAL CSS KWA AJILI YA ABOUT PAGE --- */
        .about-hero {
            background: linear-gradient(rgba(255, 71, 87, 0.9), rgba(47, 53, 66, 0.9)), url('images/placeholder.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 50px 20px;
            border-radius: 0 0 30px 30px;
        }

        .about-content {
            margin-top: -30px;
        }

        .info-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            margin-bottom: 25px;
            border: 1px solid #eee;
        }

        .section-title {
            color: var(--primary);
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            padding: 12px 0;
            border-bottom: 1px solid #f9f9f9;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .feature-list i {
            color: var(--success);
            font-size: 18px;
        }

        .contact-box {
            background: var(--dark);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
        }

        .contact-box a {
            color: var(--primary);
            font-weight: bold;
            text-decoration: none;
        }

        /* Desktop specific Adjustments */
        @media (min-width: 769px) {
            .about-container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }
        }
    </style>
</head>
<body>

<!-- Header (Inafanana na Index) -->
<header>
    <a href="index.php" class="logo-section">
        <img src="https://i.ibb.co/yF89qDJL/image-removebg-preview.webp" alt="CBE Logo">
        <h1>KADILI FD</h1>
    </a>
    <div style="display:flex; gap:15px; align-items:center;">
        <i class="fa fa-bars" id="menuBtn" style="font-size: 24px; cursor: pointer; color: var(--dark);"></i>
    </div>
</header>

<!-- Sidebar Menu (Mobile Only) -->
<div class="sidebar-overlay" id="overlay"></div>
<div class="sidebar" id="sidebar">
    <div style="text-align:right;"><i class="fa fa-times" id="closeBtn" style="font-size:24px; cursor:pointer; color:var(--primary);"></i></div>
    <ul class="sidebar-menu">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="about.php" class="active"><i class="fa fa-info-circle"></i> About Us</a></li>
        <li><a href="orders.php"><i class="fa fa-receipt"></i> My Orders</a></li>
        <li><a href="profile.php"><i class="fa fa-user"></i> My Profile</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="logout.php" style="color:red;"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        <?php else: ?>
            <li><a href="login.php"><i class="fa fa-sign-in-alt"></i> Login</a></li>
        <?php endif; ?>
    </ul>
</div>

<div class="about-hero">
    <h1>About Our System</h1>
    <p>Empowering CBE Students through Digital Food Delivery</p>
</div>

<div class="container about-content">
    <div class="about-container">
        
        <!-- Story Card -->
        <div class="info-card">
            <h3 class="section-title"><i class="fa fa-utensils"></i> Our Mission</h3>
            <p style="font-size: 14px; color: #555; line-height: 1.8;">
                <b>KADILI FOOD DELIVERY</b> is a customized digital solution developed for the <b>College of Business Education (CBE)</b>. 
                Our system aims to reduce long queues at the kitchen and ensure students receive their meals instantly within the campus environment.
            </p>
        </div>

        <!-- Services Card -->
        <div class="info-card" id="services">
            <h3 class="section-title"><i class="fa fa-concierge-bell"></i> Our Services</h3>
            <ul class="feature-list">
                <li><i class="fa fa-check-circle"></i> 🚀 Lightning Fast Campus Delivery</li>
                <li><i class="fa fa-check-circle"></i> 💳 Secure Payments via ZenoPay</li>
                <li><i class="fa fa-check-circle"></i> 🍗 Fresh CBE Kitchen Meals</li>
                <li><i class="fa fa-check-circle"></i> 📱 Mobile Friendly Ordering</li>
            </ul>
        </div>

        <!-- Tech Card -->
        <div class="info-card">
            <h3 class="section-title"><i class="fa fa-code"></i> Developer Info</h3>
            <p style="font-size: 14px; color: #555;">
                This Full-Stack system was designed and developed by <b>Ernest Daniel (Kadili Dev)</b> as a graduation project. 
                It demonstrates advanced skills in PHP, MySQL, and Mobile-First UI design.
            </p>
        </div>

        <!-- Contact Box -->
        <div class="contact-box">
            <h4>Need Support?</h4>
            <p style="font-size: 13px; margin: 10px 0;">Contact us directly via:</p>
            <p><i class="fab fa-whatsapp"></i> 0618240534</p>
            <p><i class="fa fa-envelope"></i> <a href="mailto:kadiliy17@gmail.com">kadiliy17@gmail.com</a></p>
        </div>

    </div>
</div>

<!-- Bottom Navigation for Mobile -->
<nav class="bottom-nav">
    <a href="index.php"><i class="fa fa-home"></i>Home</a>
    <a href="cart.php"><i class="fa fa-shopping-basket"></i>Basket</a>
    <a href="orders.php"><i class="fa fa-receipt"></i>Orders</a>
    <a href="about.php" class="active"><i class="fa fa-info-circle"></i>About</a>
</nav>

<footer style="text-align:center; padding: 20px; color:#888; font-size:12px; margin-bottom:80px;">
    KADILI FOOD DELIVERY &copy; 2026 | CBE Dar es Salaam
</footer>

<script>
// Sidebar Toggle Logic
const menuBtn = document.getElementById('menuBtn');
const closeBtn = document.getElementById('closeBtn');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

menuBtn.onclick = () => { sidebar.classList.add('active'); overlay.classList.add('active'); }
closeBtn.onclick = () => { sidebar.classList.remove('active'); overlay.classList.remove('active'); }
overlay.onclick = () => { sidebar.classList.remove('active'); overlay.classList.remove('active'); }
</script>

</body>
</html>