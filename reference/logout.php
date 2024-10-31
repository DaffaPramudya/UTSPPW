<?php
session_start();

// Unset only the logged-in session variables, not the entire session
unset($_SESSION['loggedin']);
unset($_SESSION['name']);

header("Location: login.php");  // Redirect to the login page
exit;
?>

