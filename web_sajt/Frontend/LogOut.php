<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Optionally, you can redirect the user to the login page or another page
header("Location: User/index.php");
exit;