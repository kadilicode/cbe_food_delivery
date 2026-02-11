<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - KADILI FD</title>
    
    <style>
        /* Variables kwa ajili ya rangi */
        :root {
            --primary: #ff4757;
            --secondary: #2f3542;
            --bg-color: #f1f2f6;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            display: flex;
            align-items: center; /* Inakaa katikati wima (vertical) */
            justify-content: center; /* Inakaa katikati mlalo (horizontal) */
            min-height: 100vh;
            padding: 15px;
        }

        .auth-card {
            background: var(--white);
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px; /* Upana wa mwisho kwenye PC */
            transition: transform 0.3s ease;
        }

        .auth-card:hover {
            transform: translateY(-5px);
        }

        .logo-area {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-area img {
            width: 90px;
            height: auto;
            margin-bottom: 10px;
        }

        .logo-area h2 {
            color: var(--secondary);
            font-size: 24px;
            font-weight: 700;
        }

        .logo-area p {
            color: #747d8c;
            font-size: 14px;
        }

        form input {
            width: 100%;
            padding: 14px 18px;
            margin-bottom: 15px;
            border: 2px solid #edeff2;
            border-radius: 12px;
            font-size: 16px; /* Muhimu kwa simu kuzuia auto-zoom */
            outline: none;
            transition: all 0.3s ease;
        }

        form input:focus {
            border-color: var(--primary);
            background-color: #fffafa;
        }

        .btn-main {
            background: var(--primary);
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(255, 71, 87, 0.3);
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-main:hover {
            background: #ff6b81;
            box-shadow: 0 6px 20px rgba(255, 71, 87, 0.4);
        }

        .footer-text {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #57606f;
        }

        .footer-text a {
            color: var(--primary);
            font-weight: bold;
            text-decoration: none;
        }

        /* Mobile Adjustments */
        @media (max-width: 480px) {
            .auth-card {
                padding: 30px 20px;
                border-radius: 15px;
            }
            
            .logo-area h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div class="auth-card">
    <div class="logo-area">
        <img src="https://i.ibb.co/yF89qDJL/image-removebg-preview.webp" alt="KADILI FD Logo">
        <h2>Join KADILI FD</h2>
        <p>Fast Delivery at CBE Campus</p>
    </div>
    
    <form action="auth_logic.php" method="POST">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="phone" placeholder="Phone Number (e.g. 07...)" required>
        <input type="password" name="password" placeholder="Create Password" required>
        
        <button type="submit" name="register" class="btn-main">
            Create Account
        </button>
    </form>
    
    <div class="footer-text">
        Already have an account? <a href="login.php">Login</a>
    </div>
</div>

</body>
</html>
