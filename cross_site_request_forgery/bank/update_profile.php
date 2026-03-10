<?php
session_start();

// Database configuration
$host = 'localhost';
$db_user = 'root'; // Your DB username
$db_pass = '';     // Your DB password
$db_name = 'bank_db';

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    die("<h1>Access Denied</h1><p>Please login first.</p>");
}

if (isset($_POST['email'])) {
    $new_email = $_POST['email'];
    $user_id = $_SESSION['user_id'];

    // VULNERABLE: Direct SQL update based on session and POST data
    $sql = "UPDATE users SET email = '$new_email' WHERE id = $user_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Profile Updated!</h1>";
        echo "<p>Your email has been changed to: " . htmlspecialchars($new_email) . "</p>";
        echo "<a href='check_status.php'>Verify in Database</a>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>