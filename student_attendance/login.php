<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle Login Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_SESSION['stored_user'])) {
        $storedUser = $_SESSION['stored_user'];

        if ($email === $storedUser['email'] && $password === $storedUser['password']) {
            $_SESSION['is_logged_in'] = true;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid credentials. Please try again.";
        }
    } else {
        $error = "No user found. Please register first.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AttendancePlus</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Ensuring the Masterclass style is applied locally if the external CSS fails */
        .auth-page-wrapper {
            background: radial-gradient(at 0% 0%, hsla(210, 100%, 93%, 1) 0, transparent 50%), 
                        radial-gradient(at 50% 0%, hsla(201, 94%, 90%, 1) 0, transparent 50%), 
                        radial-gradient(at 100% 0%, hsla(190, 100%, 91%, 1) 0, transparent 50%), #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            margin-top: 80px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            width: 100%;
            max-width: 420px;
            padding: 50px 40px;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
            text-align: center;
        }
        .error-msg {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            border: 1px solid #fecaca;
        }
    </style>
</head>
<body class="auth-page-wrapper">
    <header style="width: 100%;">
        <div class="logo">ATTENDANCE<span style="color:#38bdf8;">+</span></div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Student Login</h2>
        <p style="color: #64748b; margin-bottom: 20px;">Welcome back! Please sign in.</p>
        
        <?php if(isset($error)): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="master-btn">Sign In</button>
        </form>

        <div style="margin-top: 25px; font-size: 0.9rem; color: #475569;">
            Don't have an account? <a href="register.php" style="color: #0284c7; text-decoration: none; font-weight: bold;">Register Now</a>
        </div>
    </div>
</body>
</html>