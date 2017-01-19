<?php
$servername = "localhost";
$username = "root";
$password = "dydvlf50";
$mydb = "bbs_infra";

// Create connection
$conn = new mysqli($servername, $username, $password, $mydb);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
