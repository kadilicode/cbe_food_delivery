<?php include 'header.php'; 
if(!isset($_SESSION['user_id'])) header("Location: login.php");
$uid = $_SESSION['user_id'];
$order_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM orders WHERE user_id=$uid"));
?>

<div class="profile-header">
    <center>
        <i class="fa fa-user-circle" style="font-size:70px;"></i>
        <h2 style="margin-top:10px;"><?php echo $_SESSION['full_name']; ?></h2>
        <p style="opacity:0.9;"><?php echo $_SESSION['email']; ?></p>
        
        <div class="profile-stats">
            <div class="stat-box"><b><?php echo $order_count; ?></b><span>Orders</span></div>
            <div class="stat-box"><b>Active</b><span>Status</span></div>
            <div class="stat-box"><b>CBE</b><span>Campus</span></div>
        </div>
    </center>
</div>

<div class="container" style="margin-top:20px;">
    <div class="card">
        <ul class="sidebar-menu" style="list-style:none;">
            <li><a href="orders.php"><i class="fa fa-history"></i> Order History</a></li>
            <li><a href="about.php"><i class="fa fa-info-circle"></i> About KADILI FD</a></li>
            <li><a href="logout.php" style="color:red;"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>
    </div>
</div>

<?php include 'footer_nav.php'; ?>