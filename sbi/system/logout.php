<?php
// Start the session
session_start();

// Clear all session data
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
header("Location: ../walikelas/login.html");
exit;
?>
