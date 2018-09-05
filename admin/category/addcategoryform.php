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

$queryusers = "SELECT * from users"; 
$resultusers = mysqli_query($conn, $queryusers) or die ( mysqli_error());
//$resultusers = mysqli_fetch_assoc($resultusers);print_r($resultusers);//die("sdfsdf");
$users_string='<option>Select</option>';
 while ($row2 = mysqli_fetch_assoc($resultusers)) { 
 $users_string .="<option value=".$row2['id'].">".$row2['first_name']." ".$row2['first_name']."</option>";
 }

$upload_url = $_SERVER['HTTP_HOST']."/uploads/";

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
<script src="https://engagement.emergeinc.com/js/app.js"></script>
<script src="https://engagement.emergeinc.com/js/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>

.dropdown-menu {
    width: 300px !important;
    height: 400px !important;
}
.btn btn-danger{
margin-left:150px;
}

</style>	
</head>
<body>
       
<script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-xs-6 nopadding"><div class="form-group"> <input type="text" class="form-control" id="issue_typename" name="issue_typename[]" value="" placeholder="Category Type name"></div></div><div class="col-xs-6 nopadding"><div class="form-group"><div class="input-group"> <select class="form-control" id="user_id" name="user_id[]"><?php echo $users_string; ?></select><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>
<div class="container2">
  <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
  <div class="panel-body">
  <div class="panel-body">
    <h1 class="from-title" align="center">Create a Category</h1><br>
  <label for="Category Name">Category Name:</label>
   <form action="addcategoryformprocess.php" role="form" method="POST" enctype="multipart/form-data">
 <!-- <input type="checkbox" <?php if($cat['is_active']==0) { echo "checked"; }?> id="<?php echo $cat['id'] ?>" class="delete" name="issueresolved" value="issueresolved"> make inactive<br><br> -->
      <input type="text" class="form-control" value="<?php echo $cat['category_name'];?>" id="contact_email" name="category_name"></br>
	 <label for="image">Category Icon:</label>
      <input type="file" class="form-control" id="fileToUpload" name="fileToUpload"></br></br>
	  <div class="col-xs-6"> <label for="Image Name">Issue Type:</label> </div>
	  <div class="col-xs-6"> <label for="Image Name">Point Person:</label> </div>
<div class="col-xs-6 nopadding">
  
    <input type="hidden"  size="5"  id="issuestypes_id" name="issuestypes_id[]" value="<?php echo $row1['id'];?>" >
  
  <div class="form-group">
    <input type="text" class="form-control" id="issue_typename" name="issue_typename[]" value="<?php echo $row1['issue_typename'];?>" placeholder="Category Type name">
  </div>
</div>

<div class="col-xs-6 nopadding">
  <div class="form-group">
    <div class="input-group">
      
	  <select class="form-control" id="user_id" name="user_id[]" data-size="5">
             <?php echo $users_string; ?>
	 </select> 


     
      <div class="input-group-btn">
       <button class="btn btn-danger" type="button"  onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>

</div>

<?php while ($row1 = mysqli_fetch_assoc($resultissues)) { 
		 ?>

<?php }

?>
	 <div id="education_fields">
          
        </div>  
<input type="hidden" value="<?php echo $id;?>" name="category_id">
 <div class="input-group-btn">
        <button class="btn btn-success pull-right" type="button"  onclick="education_fields();"> ADD ANOTHER </button>
      </div><br>

   <center><button for="login_btn" type="submit" id="submit" name="submit" style="background-color:#ff9933" class="btn btn-primary btn-lg">submit</button></center>
   </form>
</body>
</html>