<?php
session_start();
if(!isset($_SESSION['isLogged'])){
	header("location: ../../login.php?RES=nopermission");
    die();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];
}
include '../conn.php';
// Check connection
 include '../../nav/nav_admin.signout.php';
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



<style>
.body{
	background-color: rgb(255, 165, 0);
}

</style>
</head>	
<body>
<script>
$(document).on('click','.delete',function(){
	
var element = $(this);
var del_id = element.attr("id");//alert(del_id);
var info = 'id=' + del_id;
if(confirm("Are you sure you want make this category active"))
{
 $.ajax({
   type: "POST",
   url: "activecategory.php",
   data: info,
   success: function(){

 }
});
  window.location.reload();
 }
return false;
});
</script>
<div class="main col-md-10 col-md-offset-1" >

<h3> Archived category </h3>
<br>  
<?php
$sql = "SELECT * from issue_categories where is_active=0";
$result = mysqli_query($conn, $sql);
$upload_url = "https://".$_SERVER['HTTP_HOST']."/uploads/";
echo "<table id='example' class='table table-striped' style='width:100%' >";

echo "<tr> <th>Category Image</th> <th>Category name</th> <th>Actions</th> </tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { 
$file = $upload_url.$row['icon_image'];
?>
<tr class="clickable-row" data-href="addcategory.php?id=<?php echo $row[id]; ?>"><?php
if(!empty($row['icon_image']) || (file_exists($file)==1))
//if(file_exists($upload_url))
{?>
  <td><img height="80" width="130" src="<?php echo  $upload_url.$row['icon_image'];?>"> </td>  <?php
}
else
{ ?>
 <td><img height="80" width="130" src="<?php echo $upload_url.'123.png'?>"> </td> <?php
} ?><?php
            echo "<td>".$row['category_name']."</td>"; ?>
             
            <td><a href="addcategory.php?id=<?php echo $row[id]; ?>"><img  src="../../images/editimage.png" width="30" height="30"/></a><?php "</td>";
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