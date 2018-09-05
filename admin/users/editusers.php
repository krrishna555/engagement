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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<title>AL Engagemenet</title>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
</head>
<body>
<?php
$editid =$_REQUEST['id'];
//print_r($editid); die('hi');
$query = "SELECT * from users where id='$editid'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>


<div class="main1 col-md-4 col-md-offset-4 col-xs-10 col-lg-4" >
<div class="container2">

<div class = "row">                                       
<div class="record-container">
  <h1 class="from-title" align="center">Edit Point Person</h1><br>
<form action="editusersprocess.php" role="form" method="POST" enctype="multipart/form-data">
<input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
<div class="form-group">
      <label for="emailaddress">Email Address:</label>
      <input type="email" class="form-control" id="email" name="email"value="<?php echo $row['email'];?>" required>
    </div>
	<div class="form-group">
      <label for="firstname">First Name:</label>
      <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name'];?>" required>
    </div>
	<div class="form-group">
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name'];?>" required>
    </div>

</div>
<br>
<button for="submit_btn" type="submit" id="submit" name="submit" value="SUBMIT" class="btn btn-primary center-block">Submit</button>
</form>
 </div>
<h3> <?php echo $row['first_name'];?> <?php echo $row['last_name'];?> is listed as the point person for the following issue types</h3>
<?php
	$sql1 = "SELECT * from issue_types where user_id=$editid";
    $result1 = mysqli_query($conn, $sql1);
	while ($row1 = mysqli_fetch_assoc($result1))
	{?>
	     <h4><a href="../category/addcategory.php?id=<?php echo $row1['category_id']?>"><?php echo $row1['issue_typename']?></a></h4>
	<?php
	}
?>
</br></br>
<?php
$query = "select * from issue_types where user_id ='$editid'";				
	$check = mysqli_query($conn,$query);
?>
<?php if(mysqli_num_rows($check)===0){?><a href="removeperson.php?id=<?php echo $editid ?>" class="btn btn-danger btn-block">Deactivate this account</a><?php } else {?><a class="btn btn-default btn-block" disabled> Remove associated issue types before deleting this account</a><?php } ?></br>
 </div>
  </div>
</body>
</html>