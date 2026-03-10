<?php
session_start();

// Simple hardcoded check
if (isset($_POST['username']) && $_POST['username'] === 'admin') {
    $_SESSION['user_id'] = 1;
    $_SESSION['username'] = 'admin';
    
    echo "<h1>Login Successful!</h1>";
    echo "<p>You are now logged into the bank.</p>";
    echo "<a href='update_profile.php'>Go to Profile Settings</a>";
} else {
    // The Login Form
    ?>
    <form method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
    <?php
}
?>