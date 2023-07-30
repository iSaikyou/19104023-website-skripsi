<?php
require_once 'app.php';

// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // ... Your existing login logic ...
    $result = $conn->query("SELECT * FROM user WHERE username = '$username' AND password = '$password' AND role = 'walikelas'")->fetch();
    $result2 = $conn->query("SELECT * FROM user WHERE username = '$username' AND password = '$password' AND role = 'walimurid'")->fetch();
    if ($result) {
        // User found, set the user data in the session
        $_SESSION['user'] = [
            'id' => $result['id'],
            'username' => $result['username'],
            'email' => $result['email']
            // Add other non-sensitive user data if needed
        ];

        // Redirect to the dashboard page
        header('Location: ../walikelas/dashboard.php');
        exit;
    }
    else if ($result2) {
        // User found, set the user data in the session
        $_SESSION['user'] = [
            'id' => $result2['id'],
            'username' => $result2['username'],
            'email' => $result2['email']
            // Add other non-sensitive user data if needed
        ];
        // Invalid login credentials, redirect back to login page
        header('Location: ../walimurid/dashboard-ortu.php');
        exit;
    }
    else {
        // Invalid login credentials, redirect back to login page
        header('Location: ../walikelas/login.html');
        exit;
    }
}
?>
