<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | KADILI FOOD DELIVERY</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #ff4757;
            --primary-hover: #ff6b81;
            --dark: #2f3542;
            --light-bg: #f1f2f6;
            --text-gray: #747d8c;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body { 
            background: linear-gradient(135deg, #f1f2f6 0%, #dfe4ea 100%); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh; 
            margin: 0; 
            padding: 20px;
        }

        .login-card {
            background: var(--white); 
            width: 100%; 
            max-width: 400px;
            padding: 45px 35px; 
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            text-align: center; 
            position: relative;
            border: 1px solid rgba(255,255,255,0.8);
        }

        /* Urembo wa logo */
        .login-card img { 
            height: 90px; 
            margin-bottom: 15px; 
            filter: drop-shadow(0 5px 10px rgba(0,0,0,0.1));
        }

        .login-card h2 { 
            font-weight: 800; 
            color: var(--dark); 
            margin-bottom: 8px; 
            font-size: 1.6rem; 
            letter-spacing: -0.5px;
        }

        .login-card p { 
            color: var(--text-gray); 
            font-size: 14px; 
            margin-bottom: 35px; 
        }

        /* Style za Input Groups */
        .input-group { 
            position: relative; 
            margin-bottom: 20px; 
            text-align: left;
        }

        .input-group i { 
            position: absolute; 
            left: 18px; 
            top: 50%; 
            transform: translateY(-50%); 
            color: var(--primary); 
            font-size: 18px;
            z-index: 10;
        }

        .input-group input { 
            width: 100%;
            padding: 15px 15px 15px 50px; 
            border-radius: 15px;
            border: 2px solid #edf2f7;
            background: #f8fafc;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
            color: var(--dark);
        }

        .input-group input:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(255, 71, 87, 0.1);
        }

        /* Login Button */
        .btn-login { 
            background: var(--primary); 
            color: #fff; 
            border: none; 
            padding: 16px; 
            width: 100%; 
            border-radius: 15px; 
            font-weight: 700; 
            font-size: 16px;
            cursor: pointer; 
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(255, 71, 87, 0.3);
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-login:hover { 
            background: var(--primary-hover);
            transform: translateY(-2px); 
            box-shadow: 0 10px 25px rgba(255, 71, 87, 0.4); 
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* Footer Links */
        .footer-text {
            margin-top: 30px; 
            font-size: 14px; 
            color: var(--text-gray);
        }

        .footer-text a { 
            color: var(--primary); 
            font-weight: 700; 
            text-decoration: none; 
            transition: 0.2s;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        /* Responsive kwa simu ndogo */
        @media (max-width: 400px) {
            .login-card {
                padding: 35px 20px;
                border-radius: 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-card">
    <img src="https://i.ibb.co/yF89qDJL/image-removebg-preview.webp" alt="KADILI FD Logo">
    
    <h2>Welcome Back</h2>
    <p>Sign in to order your favorite meal</p>
    
    <form action="auth_logic.php" method="POST">
        <div class="input-group">
            <i class="fa fa-envelope"></i>
            <input type="email" name="email" placeholder="Email Address" required>
        </div>
        
        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        
        <button type="submit" name="login" class="btn-login">
            <i class="fa-solid fa-right-to-bracket" style="margin-right: 8px;"></i> LOGIN
        </button>
    </form>

    <div class="footer-text">
        New to Kadili FD? <a href="register.php">Create Account</a>
    </div>
</div>

</body>
</html>
