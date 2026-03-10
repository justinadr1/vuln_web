<?php
$conn = new mysqli('localhost', 'root', '', 'bank_db');
$result = $conn->query("SELECT username, email FROM users WHERE id = 1");
$user = $result->fetch_assoc();

echo "<h1>Database Current State</h1>";
echo "<strong>User:</strong> " . $user['username'] . "<br>";
echo "<strong>Email:</strong> " . $user['email'] . "<br>";
echo "<hr>";
echo "<a href='login.php'>Back to Login</a>";
?>