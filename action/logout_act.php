<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

header("Location: /toko_online/pages/login_view.php"); 
?>