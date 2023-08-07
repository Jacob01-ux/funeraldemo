<?php
// Start the session
session_start();

// Check if the session has expired
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    // Session has expired
    session_unset();
    session_destroy();
    header("Location: ../samples/login-2.php");
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();
?>