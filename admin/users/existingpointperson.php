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
if(confirm("Are you sure you want to remove this person"))
{
 $.ajax({
   type: "POST",
   url: "removeperson.php",
   data: info,
   success: function(){

 }
});
  window.location.reload();
 }
return false;
});
</script>
<div class="main col-md-10 col-md-offset-1 col-lg-10" >
<a href="addusers.php"><button class="btn btn-primary pull-right" type="submit">Add Point Person</button></a></div>
<div class="main col-md-10 col-md-offset-1 col-xs-10 col-lg-10" >
<div class="container2">
<!-- <div class = "row">
	<?php
	$id=$_REQUEST['user_id1'];
	$sql1 = "SELECT * from issue_types where user_id=$id";
	//echo($sql1); die('hi');
    $result1 = mysqli_query($conn, $sql1);
	 
    if(isset($_GET['RES']))
    {?><div class='alert alert-success'> <p>User exist in the following issue types please assign a new user:</p></br>                                
      <?php  if($_GET['RES']=='userexist'){ while ($row1 = mysqli_fetch_assoc($result1)){ echo $row1['issue_typename']."</br>";}}
      }
      ?>
      </div> -->
</br> 
<div class="record-container">
<?php
$sql = "SELECT * from users";
$result = mysqli_query($conn, $sql);
$upload_url = $_SERVER['HTTP_HOST']."/uploads/";
echo "<table id='example' class='table table-striped' style='width:100%' >";

echo "<tr> <th>Email</th> <th>First Name</th> <th>Last Name</th> <th>Actions</th> </tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { ?>
<tr class="clickable-row" data-href="editusers.php?id=<?php echo $row['id'] ?>">
            <?php
            echo "<td>".$row['email']."</td>"; 
            echo "<td>".$row['first_name']."</td>"; 
            echo "<td>".$row['last_name']."</td>"; ?>           
            <td><a href="editusers.php?id=<?php echo $row['id'] ?>"><img  src="../../images/editimage.png" width="30" height="30"/></a></td>
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