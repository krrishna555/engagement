<?php
session_start();
if(!isset($_SESSION['isLogged'])){
	header("location: ../../login.php?RES=nopermission");
    die();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];
}
include '../../nav/nav_admin.signout.php';
//include 'adminsidebar.php';
include("../conn.php");
$id = $_REQUEST['id'];
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

 td {
    width:250px;
    padding: 0 10px 0 0;
    margin: 0;
    border: 0;
    }
	
</style> 
</head>
<body>
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

<div class="main col-md-10 col-md-offset-1 col-xs-10 col-lg-10" >
<a href="showclosedissues.php"><button for="submit_btn" type="submit" id="submit" name="submit" value="SUBMIT" class="btn btn-primary pull-right">Show closed issues</button></a></br></br>
<?php

include("conn.php");
$id = $_REQUEST['id'];
$query = "SELECT issues.id,issues.image_url,issues.location,issues.created_at,issue_types.issue_typename,issue_categories.is_active, issue_categories.category_name from issues
LEFT JOIN issue_types ON issues.type_id= issue_types.id 
INNER JOIN issue_categories ON issues.category_id= issue_categories.id
where issue_solved=0 AND issue_categories.is_active=1 ORDER BY created_at DESC"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$upload_url = "https://".$_SERVER['HTTP_HOST']."/uploads/";

echo "<table id='example' class='table table-striped' style='width:100%' >";

echo "<tr> <th>image</th><th>Issue Type</th><th>location</th></th> <th>Issue created Date</th> </tr>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$file = $upload_url.$row['image_url'];?>
<tr class="clickable-row" data-href="issueinfo.php?locationid=<?php echo $row['id'];?>"><?php
if(!empty($row['image_url']) || (file_exists($file)==1))
//if(file_exists($upload_url))
{?>
  <td style="width:25%"><img height="80" width="150" src="<?php echo  $upload_url.$row['image_url'];?>"> </td>  <?php
}
else
{ ?>
 <td style="width:25%"><img height="80" width="150" src="<?php echo $upload_url.'noimage.png'?>"> </td> <?php
} ?>	
	<td style="width:35%"><?php echo $row['category_name'];?>: <?php echo $row['issue_typename'];?> </td>
	<td style="width:25%"><?php echo $row['location'];?> </td>
	<td><?php echo date('M d Y, h:i A', strtotime($row['created_at'])); ?> </td>
	
	       
             
           
			<?php 
	echo"</tr>";
    }
} else {
    echo "0 results";
}

?>
     
  </div>
</div>
</div>


  </div>
</body>
</html>