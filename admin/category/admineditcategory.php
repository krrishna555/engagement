<?php
include 'nav_admin.signout.php';
include 'adminsidebar.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
.container2
{
	margin-top:100px;
}
.sidebar {
position:fixed;
  display: block;
  top: 82px;
 
  bottom:0;
  z-index: 1000;
  min-height: 100%;
  max-height: none;
  overflow: auto;
}
	
</style> 
</head>
<body>

<?php

include("conn.php");
$id = $_REQUEST['id'];
$query = "SELECT issue_types.issue_typename, issue_types.contact_email, issue_categories.category_name from issue_types  INNER JOIN issue_categories ON issue_types.category_id = issue_categories.id where issue_types.category_id='$id'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result); print_r($row);
?>


<?php
$status = "";
if(isset($_POST['submit']))
{

$LocationTypeName=$_POST['LocationTypeName'];
$LocationTypeColor=$_POST['LocationTypeColor'];
$update="UPDATE health_locationtype set LocationTypeName='$LocationTypeName', LocationTypeColor='$LocationTypeColor' where LocationTypeId='$LocationTypeId'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "<script type='text/javascript'>alert('update Successfully!'); window.location.replace('admineditcategory.php');</script>";
echo ".$status.";
}else {
?>

<div class="container2">
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
<div class="record-container">

<h3> Edit Category Here </h3><br>
<form name="form" method="post" action="admineditcategory.php"> 
  <div class="form-group">
<input type="hidden" name="new" value="1" />
<label for="Categoryname">Category Name:</label>
<input type="text" name="category_name" class="form-control" value="<?php echo $row['category_name'];?>" /><br>
<label for="Categorytypename">Category Type Name:</label>
<p><input type="text" name="LocationTypeName" class="form-control" placeholder="Category Name" 
required value="<?php echo $row['issue_typename'];?>" /></p>
<label for="contactemail">Contact email:</label>
<p><input type="text" name="LocationTypeColor" class="form-control" placeholder="Markercolor" 
required value="<?php echo $row['contact_email'];?>" /></p><br><br>
<p><input name="submit" type="submit" value="Update" class="btn btn-primary center-block" onclick="return confirm('Are you sure you want to Update this category?')" /></p>
</form>
<?php } ?>
</div>
</div>
</div>
</body>
</html>