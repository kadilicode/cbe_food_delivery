<?php 
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --admin-bg: #f8f9fa; --admin-dark: #343a40; }
        body { background: var(--admin-bg); }
        .admin-nav { background: var(--admin-dark); padding: 0; position: sticky; top: 0; z-index: 1000; }
        .admin-nav ul { list-style: none; display: flex; overflow-x: auto; padding: 0 5%; }
        .admin-nav li a { color: #fff; text-decoration: none; padding: 15px 20px; display: block; font-size: 14px; font-weight: 500; white-space: nowrap; }
        .admin-nav li a.active { background: var(--primary); }
        .stat-card { background: #fff; padding: 20px; border-radius: 15px; border-left: 5px solid var(--primary); box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .stat-card h3 { color: #888; font-size: 14px; text-transform: uppercase; }
        .stat-card h2 { font-size: 24px; margin-top: 5px; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 10px; overflow: hidden; margin-top: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; font-size: 14px; }
        th { background: #eee; font-weight: 800; color: var(--dark); }
        .badge-status { padding: 5px 10px; border-radius: 20px; font-size: 11px; font-weight: bold; }
        .bg-pending { background: #fff3cd; color: #856404; }
        .bg-success { background: #d4edda; color: #155724; }
    </style>
</head>
<body>

<header style="background: #fff; border-bottom: 1px solid #eee;">
    <div class="logo-section" style="padding: 10px 5%;">
        <img src="https://i.ibb.co/yF89qDJL/image-removebg-preview.webp" alt="CBE">
        <h1 style="color: var(--dark);">ADMIN PORTAL</h1>
    </div>
</header>

<nav class="admin-nav">
    <ul>
        <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="orders.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'orders.php' ? 'active' : ''; ?>"><i class="fa fa-shopping-bag"></i> Orders</a></li>
        <li><a href="products.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'active' : ''; ?>"><i class="fa fa-utensils"></i> Menu Management</a></li>
        <li><a href="../logout.php" style="color: #ff4757;"><i class="fa fa-power-off"></i> Logout</a></li>
    </ul>
</nav>