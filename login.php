<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check against session data
    if (isset($_SESSION['student'])) {
        $student = $_SESSION['student'];

        if ($email === $student['email'] && $password === $student['password']) {
            $_SESSION['logged_in'] = true;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid email or password!";
        }
    } else {
        $error = "No registered student found. Please register first.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page-container">
        <div class="login-box">
    <div>
        <h2>Login</h2>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <div class="input-group">
       </div>Users email: <input class ="btm" type="email" name="email" required></label>
        <i class='bx bx-user'></i><br><br>

      <div>
        <label>Password: <input class ="btm" type="password" name="password" required></label>
        <i class='bx bx-lock-alt'></i>
       </div><br>
       
            <button class="btn btn-login" type="submit">Login</button>
        </form>
        </div>
    </div>
    </div>
</body>
</html>
      
      