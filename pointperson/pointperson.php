<?php
include '../nav/personnav_signout.php';
//include 'pointpersonsidebar.php';
session_start();
//echo($_SESSION['id']); die('hi');
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];
}else{
    header("location: ../login.php");
    die();
}
include("conn.php");
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
	h2{
	top:100px;
	}
	
</style> 
</head>
<body>
<script>
$(document).on('click','.delete',function(){
	
var element = $(this);
var del_id = element.attr("id");//alert(del_id);
var info = 'id=' + del_id;
if(confirm("Are you sure you want to update this to issue resolved"))
{
 $.ajax({
   type: "POST",
   url: "remove.php",
   data: info,
   success: function(){

 }
});
  $(this).parents("tr").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});

</script>
<div class="main col-md-12 col-xs-12 col-lg-12" >
<a href="showclosedpointissues.php"><button for="submit_btn" type="submit" id="submit" name="submit" value="SUBMIT" class="btn btn-primary pull-right">Show closed issues</button></a></br></br>
<?php

include("conn.php");
 $user_id = $_SESSION['id'];
$queryissues = "SELECT i.id,i.location,i.image_url,i.created_at,it.issue_typename,ic.category_name from issues i INNER JOIN issue_types it on it.id=i.type_id INNER JOIN issue_categories ic on ic.id = it.category_id where it.user_id=$user_id and issue_solved=0 ORDER BY created_at DESC";

 $resultiss = mysqli_query($conn, $queryissues) or die ( mysqli_error());


$upload_url = "https://".$_SERVER['HTTP_HOST']."/uploads/";
echo "<table id='example' class='table table-striped' style='width:100%' >";

echo "<tr> <th>Image</th><th>IssueType</th><th>location</th><th>Issue Created Date</th> </tr>";
if (mysqli_num_rows($resultiss) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultiss)) {
	$file = $upload_url.$row['image_url'];?>
	<tr class="clickable-row" data-href="issueinfoperson.php?locationid=<?php echo $row['id'];?>"><?php
if(!empty($row['image_url']) || (file_exists($file)==1))
{?>
  <td><img height="80" width="130" src="<?php echo $upload_url.$row['image_url'];?>"> </td>  <?php
}
else
{ ?>
 <td><img height="80" width="130" src="<?php echo $upload_url.'noimage.png'?>"> </td> <?php
} ?>	
    <td style="width:35%"><?php echo $row['category_name'];?>: <?php echo $row['issue_typename'];?> </td>
	<td><?php echo $row['location'];?></a> </td>	
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
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

  </div>
</body>
</html>