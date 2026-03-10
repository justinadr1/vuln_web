<?php
header('Content-Type: application/json');

// Get all headers from the curl request
$headers = getallheaders();

// Check for the "Noble Researcher" bypass header
if (isset($headers['X-Dev-Access']) && $headers['X-Dev-Access'] === 'yes') {
    echo json_encode([
        "success" => true,
        "flag" => "picoCTF{local_bypass_successful_1337}"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Invalid credentials or missing dev header"
    ]);
}
?>