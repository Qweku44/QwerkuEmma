<?php
session_start();
session_unset();
session_destroy(); // Destroy session [cite: 43]
header("Location: login.php"); // Redirect to login [cite: 43]
exit();
?>