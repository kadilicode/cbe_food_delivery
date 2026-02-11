<?php include '../config.php'; include 'admin_header.php'; ?>

<div class="container">
    <div style="margin-bottom: 20px;">
        <h2>Dashboard Overview</h2>
        <p style="color:#888;">Live statistics for KADILI Food Delivery</p>
    </div>

    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:20px;">
        <?php
        $orders_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM orders"));
        $customers_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM users WHERE role='user'"));
        $total_sales = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_amount) as total FROM orders WHERE payment_status='Completed'"));
        $pending_orders = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM orders WHERE order_status != 'Delivered'"));
        ?>
        <div class="stat-card">
            <h3>Total Orders</h3>
            <h2><?php echo $orders_count; ?></h2>
        </div>
        <div class="stat-card" style="border-left-color: #2ed573;">
            <h3>Revenue</h3>
            <h2>Tsh <?php echo number_format($total_sales['total'] ?? 0); ?></h2>
        </div>
        <div class="stat-card" style="border-left-color: #ffa502;">
            <h3>Pending Tasks</h3>
            <h2><?php echo $pending_orders; ?></h2>
        </div>
        <div class="stat-card" style="border-left-color: #1e90ff;">
            <h3>Active Users</h3>
            <h2><?php echo $customers_count; ?></h2>
        </div>
    </div>

    <div style="margin-top: 40px;">
        <h3>Recent Activity</h3>
        <div class="card" style="padding:0;">
            <table>
                <thead>
                    <tr><th>Order #</th><th>Status</th><th>Time</th></tr>
                </thead>
                <tbody>
                    <?php
                    $recent = mysqli_query($conn, "SELECT order_number, order_status, created_at FROM orders ORDER BY id DESC LIMIT 5");
                    while($r = mysqli_fetch_assoc($recent)) {
                        echo "<tr>
                            <td>#{$r['order_number']}</td>
                            <td><span class='badge-status bg-pending'>{$r['order_status']}</span></td>
                            <td>".date('H:i A', strtotime($r['created_at']))."</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>