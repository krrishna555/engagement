<?php
include 'conn.php';
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<title>engagement</title>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

 
    <link rel="css/stylesheet" href="style.css">
    <link href="css/style3.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main col-md-8 col-md-offset-2 col-xs-6 col-lg-6" >

<h3> Edit or Delete Existing category </h3>
<br>  
<?php
$sql = "SELECT * from issue_categories";
$result = mysqli_query($conn, $sql);
echo "<table border='2' cellpadding='10' >";

echo "<tr> <th>category ID</th> <th><center>Category name</center></th> <th>Edit or Delete</th> </tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

	echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['category_name']."</td>";
             
            echo "<td><a href=\"admineditcategory.php?QuestionId=$row[id]\">Edit</a> | <a href=\"admindeletecategory.php?QuestionId=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	echo"</tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
  </div>
  </div>
</div>
</div>
</div>
</body>
</html>