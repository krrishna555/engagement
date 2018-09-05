<?php
$servername = "engagement.emergeinc.com";
$username = "engagement";
$password = "ssgR62&3ssgR62&3";
$dbname = "engagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>