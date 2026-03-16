<?php
$host = "db.zelpstore.com";      // Endpoint
$user = "u3033_KICJ1moJbc";      // Username
$pass = "PASSWORD_LO";            // Password database lo
$dbname = "s3033_lifeasmp";      // Database Name
$port = 3306;                     // Port

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>