<?php include '../config.php'; include 'admin_header.php'; 

// Add Product
if(isset($_POST['add_product'])) {
    $name = sanitize($_POST['name']);
    $price = sanitize($_POST['price']);
    $image_url = sanitize($_POST['image_url']); // Inachukua URL sasa
    mysqli_query($conn, "INSERT INTO products (name, price, image, category_id) VALUES ('$name', '$price', '$image_url', 1)");
}

// Delete
if(isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    header("Location: products.php");
}
?>

<div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2>Menu Management</h2>
        <button onclick="document.getElementById('addBox').style.display='block'" class="btn-main" style="width:auto; padding:10px 20px;">+ Add Item</button>
    </div>

    <!-- Add Form -->
    <div id="addBox" class="card" style="display:none; border-top: 5px solid var(--success);">
        <h3>Add New Dish</h3>
        <form method="POST">
            <input type="text" name="name" placeholder="Food Name (e.g. Beef Biryani)" required>
            <input type="number" name="price" placeholder="Price (Tsh)" required>
            <input type="url" name="image_url" placeholder="Image URL (e.g. https://image.com/dish.jpg)" required>
            <div style="display:flex; gap:10px;">
                <button type="submit" name="add_product" class="btn-main" style="background:var(--success)">Save Dish</button>
                <button type="button" onclick="document.getElementById('addBox').style.display='none'" class="btn-main" style="background:#888">Cancel</button>
            </div>
        </form>
    </div>

    <div class="food-grid" style="margin-top:20px;">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
        while($p = mysqli_fetch_assoc($res)) {
            echo "
            <div class='card' style='text-align:center; padding:15px;'>
                <img src='{$p['image']}' style='width:100%; height:120px; object-fit:cover; border-radius:10px;' onerror=\"this.src='../images/placeholder.jpg'\">
                <h4 style='margin:10px 0;'>{$p['name']}</h4>
                <p style='color:var(--primary); font-weight:bold;'>Tsh ".number_format($p['price'])."</p>
                <a href='?delete={$p['id']}' style='color:#ff4757; text-decoration:none; font-size:13px; font-weight:bold;' onclick=\"return confirm('Delete this?')\"><i class='fa fa-trash'></i> REMOVE</a>
            </div>";
        }
        ?>
    </div>
</div>
</body>
</html>