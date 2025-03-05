<?php

// Database credentials (store these securely, e.g., in a separate config file)
$db_host = "localhost"; // Or your database host
$db_username = "root";
$db_password = "";
$db_name = "scholarship";

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Log this error for debugging
    
}





?>