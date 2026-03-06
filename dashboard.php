<?php
session_start();
if (!isset($_SESSION['student'])) {
    echo "No registration data found.";
    exit;
}

$student = $_SESSION['student'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registration Successful!</h2>
        <p><strong>Photo:</strong><br><img src="<?= $student['photo'] ?>" width="120"></p>
        <p><strong>Name:</strong> <?= $student['fname'] . " " . $student['lname'] ?></p>
        <p><strong>Father's Name:</strong> <?= $student['fathername'] ?></p>
        <p><strong>Date of Birth:</strong> <?= $student['dob'] ?></p>
        <p><strong>Mobile:</strong> <?= $student['mobile'] ?></p>
        <p><strong>Email:</strong> <?= $student['email'] ?></p>
        <p><strong>Password:</strong> <?= $student['password'] ?></p>
        <p><strong>Gender:</strong> <?= $student['gender'] ?></p>
        <p><strong>Department:</strong> <?= $student['department'] ?></p>
        <p><strong>Course:</strong> <?= $student['course'] ?></p>
        <p><strong>City:</strong> <?= $student['city'] ?></p>
        <p><strong>Address:</strong> <?= $student['address'] ?></p>
        <?php if (!empty($student['photo'])): ?>
        <?php endif; ?>
        <a href="logout.php"><button class ="btm">Logout</button></a>
    </div>
</body>
</html>