<?php
session_start(); // start the session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $_SESSION['student'] = [
        'fname'      => $_POST['fname'],
        'lname'      => $_POST['lname'],
        'fathername' => $_POST['fathername'],
        'dob'        => $_POST['dob'],
        'mobile'     => $_POST['mobile'],
        'email'      => $_POST['email'],
        'password'   => $_POST['password'],
        'gender'     => $_POST['gender'],
        'department' => $_POST['department'],
        'course'     => $_POST['course'],
        'city'       => $_POST['city'],
        'address'    => $_POST['address']
    ];

    // Handle photo upload
    if (!empty($_FILES['photo']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $photo = $targetDir . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photo);
        $_SESSION['student']['photo'] = $photo;
    }
    $_SESSION['flash message'] ='You have been Registered Successfully! Please log in.';
    echo"You have been Registered Successfully!";

    // Redirect to a confirmation page
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Registration Form</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- External CSS -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="logo">LOGO.</div>
    <div class="welcome">Student Registration Form</div>
    <div class="subtext">
      Please fill in your details below to join The Squad.
    </div>

    <form action="register.php" method="post" enctype="multipart/form-data">
      <label class="form-label" for="fname">First Name</label><br>
      <input class ="btm"  type="text" id="fname" name="fname"><br>

      <label class="form-label" for="lname">Last Name</label><br>
      <input class ="btm"  type="text" id="lname" name="lname"><br>

      <label class="form-label" for="father">Father's Name</label><br>
      <input class ="btm"  type="text" id="father" name="father"><br>

      <label class="form-label" for="dob">Date of Birth</label><br>
      <input class ="btm"  type="date" id="dob" name="dob"><br>

      <label class="form-label" for="mobile">Mobile No.</label><br>
      <input class ="btm" type="number" id="mobile" name="mobile"><br>

      <label class="form-label" for="email">Email ID</label><br>
      <input class ="btm" type="email" id="email" name="email"><br>

      <label class="form-label" for="password">Password</label><br>
      <input class ="btm" type="password" id="password" name="password"><br>

      <label class="form-label" for="gender">Gender</label><br>
      <select class ="btm"  id="gender" name="gender">
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
      </select><br>

      <label class="form-label" for="department">Department</label><br>
      <select class ="btm"  id="department" name="department">
        <option>CSE</option>
        <option>ECE</option>
        <option>ME</option>
      </select><br>

      <label class="form-label" for="course">Course</label><br>
      <select class ="btm"  id="course" name="course">
        <option>Select Current Course</option>
        <option>Bachelor</option>
        <option>Master</option>
      </select><br><br>

      <label class="form-label" for="photo">Student Photo</label>
      <input class ="btm" type="file" id="photo" name="photo"><br>

      <label class="form-label" for="city">City</label><br>
      <input class ="btm"  type="text" id="city" name="city"><br>

      <label class ="btm" for="address">Address</label><br>
      <textarea class="form-textarea" id="address" name="address"></textarea><br>

      <button class="btn btn-login" type="submit">Register</button>
    </form>
  </div>
</body>
</html>
