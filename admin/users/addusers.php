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
<div class="main1 col-md-4 col-md-offset-4 col-xs-10 col-lg-4" >
<div class="container2">

<div class = "row">

  	<?php
        if(isset($_GET['RES']))
            {
                if($_GET['RES']=='PasSNomTch'){echo "<div class='alert alert-success'>Registration success!!!</div>";}
				else{echo "<div class='alert alert-danger'>Email already exist exist, enter a new-one!!!</div>";}
            }
             ?>
                                       
<div class="record-container">
  <h1 class="from-title" align="center">Add a Point Person</h1><br>
<form action="addusersprocess.php" role="form" method="POST" enctype="multipart/form-data">

    
<div class="form-group">
      <label for="firstname">First Name:</label>
      <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>
	<div class="form-group">
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>
		<div class="form-group">
      <label for="emailaddress">Email Address:</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

</div>
<br>
<button for="submit_btn" type="submit" id="submit" name="submit" value="SUBMIT" class="btn btn-primary center-block">Submit</button>
</form>
  </div>
  </div>
  </div>
</div>

</body>
</html>