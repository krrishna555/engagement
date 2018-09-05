<?php

// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'engagement';
$dbPassword = 'ssgR62&3ssgR62&3';
$dbName     = 'engagement';

// Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get search term
$searchTerm = $_GET['term'];

// Get matched data from skills table
$query = $db->query("SELECT * FROM issue_categories WHERE category_name LIKE '%".$searchTerm."%'");

// Generate skills data array
$skillData = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data['id'] = $row['id'];
        $data['value'] = $row['category_name'];
        array_push($skillData, $data);
    }
}

// Return results as json encoded array
echo json_encode($skillData);

?>