<?php
$host = 'localhost';
$db   = 'hospital_sys';
$user = 'root';
$pass = '';

// 1. Establish the connection
$conn = mysqli_connect($host, $user, $pass, $db,3307);

// 2. Check if the connection worked
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 3. Set the charset (good practice for special characters)
mysqli_set_charset($conn, "utf8mb4");

// echo "Connected successfully!"; 
?>