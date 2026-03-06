<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // 1. Setup Directory
    $target_dir = "profiles/";
    if (!is_dir($target_dir)) { 
        mkdir($target_dir, 0777, true); 
    }
    
    // 2. Handle File Upload
    $file_name = "default.png"; // Default fallback
    if (isset($_FILES["profile_pic"]) && $_FILES["profile_pic"]["error"] == 0) {
        $generated_name = time() . "_" . basename($_FILES["profile_pic"]["name"]);
        $target_file = $target_dir . $generated_name;
        
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            $file_name = $generated_name;
        }
    }

    // 3. Store EVERYTHING in the session
    $_SESSION['stored_user'] = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'pic' => $file_name
    ];

    echo "<script>alert('Registration Successful! Now Login.'); window.location='login.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AttendancePlus</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-page-wrapper">
    <header>
        <div class="logo">ATTENDANCE<span style="color:#38bdf8;">+</span></div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Student Registration</h2>
        <p style="color: #64748b; margin-bottom: 20px;">Create your account to start tracking</p>
        
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Create Password" required>
            
            <div style="text-align: left; margin-top: 10px;">
                <label style="font-size: 0.8rem; color: #64748b;">Profile Photo:</label>
                <input type="file" name="profile_pic" accept="image/*" required style="border: none; padding: 10px 0;">
            </div>

            <button type="submit">Register Account</button>
        </form>
    </div>
</body>
</html>