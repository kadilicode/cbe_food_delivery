<?php include '../config.php'; include 'admin_header.php'; 

if(isset($_POST['update_status'])) {
    $oid = $_POST['order_id'];
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE orders SET order_status='$status' WHERE id=$oid");
}
?>

<div class="container">
    <h2>Customer Orders</h2>
    <p style="color:#888; margin-bottom:20px;">Manage delivery status for incoming orders.</p>

    <?php
    $orders = mysqli_query($conn, "SELECT orders.*, users.full_name, users.phone FROM orders JOIN users ON orders.user_id = users.id ORDER BY id DESC");
    if(mysqli_num_rows($orders) > 0) {
        while($o = mysqli_fetch_assoc($orders)) {
            $status_class = ($o['order_status'] == 'Delivered') ? 'bg-success' : 'bg-pending';
            ?>
            <div class="card" style="padding:15px; border-left: 5px solid var(--primary); margin-bottom:15px;">
                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                    <div>
                        <b style="font-size:16px;">#<?php echo $o['order_number']; ?></b><br>
                        <span style="font-size:14px; font-weight:600;"><?php echo $o['full_name']; ?></span><br>
                        <small style="color:#555;"><i class="fa fa-phone"></i> <?php echo $o['phone']; ?></small>
                    </div>
                    <div style="text-align:right;">
                        <b style="color:var(--primary);">Tsh <?php echo number_format($o['total_amount']); ?></b><br>
                        <span class="badge-status <?php echo $status_class; ?>" style="display:inline-block; margin-top:5px;"><?php echo $o['order_status']; ?></span>
                    </div>
                </div>
                
                <hr style="margin:12px 0; opacity:0.1;">
                
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-size:12px; color:#888;">Method: <?php echo $o['payment_method']; ?></span>
                    <form method="POST" style="display:flex; gap:5px;">
                        <input type="hidden" name="order_id" value="<?php echo $o['id']; ?>">
                        <select name="status" style="width:auto; margin:0; padding:6px; font-size:12px; border-radius:5px;">
                            <option <?php if($o['order_status']=='Received') echo 'selected'; ?>>Received</option>
                            <option <?php if($o['order_status']=='Cooking') echo 'selected'; ?>>Cooking</option>
                            <option <?php if($o['order_status']=='Delivered') echo 'selected'; ?>>Delivered</option>
                        </select>
                        <button type="submit" name="update_status" style="background:var(--dark); color:#fff; border:none; padding:6px 12px; border-radius:5px; cursor:pointer; font-size:12px; font-weight:bold;">Update</button>
                    </form>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<center><p style='padding:40px; color:#888;'>No orders received yet.</p></center>";
    }
    ?>
</div>
</body>
</html>