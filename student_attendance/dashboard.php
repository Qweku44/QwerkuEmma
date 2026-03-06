<?php
session_start();

// SECURITY: If session is missing, redirect to login
if (!isset($_SESSION['stored_user'])) {
    header("Location: login.php?error=no_session");
    exit();
}

$user = $_SESSION['stored_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | AttendancePlus</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">ATTENDANCE<span style="color:#38bdf8;">+</span></div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main class="dashboard-container">
        <section class="frame-one">
            <h3>Student Dashboard</h3>
            <hr style="border: 0; border-top: 1px solid #334155; margin: 15px 0;">
            <p>Welcome,</p>
            <h2 style="color: #38bdf8; margin-top: 5px;"><?php echo $user['name']; ?></h2>
            <br>
            <a href="logout.php" style="color: #f87171; text-decoration: none; font-weight: bold;">Sign Out</a>
        </section>

        <section class="frame-two">
            <div class="review-box">
                <div class="image-container">
                    <?php 
                        $imgPath = "profiles/" . $user['pic'];
                        // If image file doesn't exist on disk, use a placeholder
                        if (!file_exists($imgPath) || $user['pic'] == "default.png") {
                            $imgPath = "https://ui-avatars.com/api/?name=".urlencode($user['name'])."&background=38bdf8&color=fff";
                        }
                    ?>
                    <img src="<?php echo $imgPath; ?>" class="profile-circle" alt="Profile">
                </div>
                
                <div class="details-text">
                    <table class="details-table">
                        <tr>
                            <th>Verification Status</th>
                            <td style="color: #10b981; font-weight: bold;">● Active</td>
                        </tr>
                        <tr>
                            <th>Full Name</th>
                            <td><?php echo $user['name']; ?></td>
                        </tr>
                        <tr>
                            <th>Student Email</th>
                            <td><?php echo $user['email']; ?></td>
                        </tr>
                        <tr>
                            <th>Enrollment Date</th>
                            <td><?php echo date("F d, Y"); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <footer style="text-align: center; padding: 20px; color: #94a3b8;">
        <p>&copy; 2026 AttendancePlus Management System</p>
    </footer>
</body>
</html>