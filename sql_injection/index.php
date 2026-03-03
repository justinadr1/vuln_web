<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'vuln_db';

$connect = mysqli_connect($host, $user, $password, $database);

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    
    // $id is wrapped in single quotes but not "escaped"
    $query = "SELECT username, email FROM users WHERE id = '$id'";

    echo "<b>Executing Query:</b> " . $query . "<br><hr>";

    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "Username: " . $row["username"] . " - Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "0 results found.";
    }
} else {
    echo "Please provide an ID. Example: index.php?id=1";
}

mysqli_close($connect);

?>