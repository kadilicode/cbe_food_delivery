<?php
include 'config.php';

if (isset($_POST['login'])) {
    $email = sanitize($_POST['email']);
    $pass = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($res);

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role']; // Hapa ndipo Admin anatambulika

        if ($user['role'] == 'admin') {
            header("Location: admin/index.php"); // Mpeleke Admin hapa
        } else {
            header("Location: index.php"); // Mpeleke User hapa
        }
    } else {
        header("Location: login.php?error=Invalid Credentials");
    }
}
?>