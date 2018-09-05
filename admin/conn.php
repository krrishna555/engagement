<?php
$servername = "localhost";
$username = "engagement";
$password = "ssgR62&3ssgR62&3";
$dbname = "engagement";

$msg=" ";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>