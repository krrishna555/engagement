<?php
session_start();
if(!isset($_SESSION['isLogged'])){
	header("location: ../../login.php?RES=nopermission");
    die();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];
}
include 'conn.php';
// Check connection
 include 'nav/nav_admin.signout.php';
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="css/stylelogin.css" rel="stylesheet" type="text/css">
<style>

</style>	
</head>
<body>
<body>

<div class="container">
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div id='login-container' class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id='login-container' class="login-container" style="border:2px; border-style:solid; border-color:#add8e6; padding: 1em;">
                                        

  <h1 class="from-title" align="center">I WANT TO:</h1></br>


	  
		    <a style="background-color:#E6E7E7; text-align:left" href="admin/category/issueadmin.php" class="btn btn-lg btn-block" >&nbsp;<strong>Add and Modify Categories</strong><span class="glyphicon glyphicon-chevron-right pull-right"></span> </a></br>
		     <a href="admin/issues/fetchissues.php" style="background-color:#E6E7E7; text-align:left" class="btn btn-lg btn-block">&nbsp;<strong class="text-left"> View Reported Issues</strong><span class="glyphicon glyphicon-chevron-right pull-right"></span>
        </a></br>
		 <a href="admin/users/existingpointperson.php" style="background-color:#E6E7E7; text-align:left" class="btn btn-lg btn-block"><strong>   
           Add and Modify Point Persons</strong><span class="glyphicon glyphicon-chevron-right pull-right"></span>
        </a></br>
		


  </div>
	  
		  
		

  </div>
  </div>
  </div>
</div>
</body>
</html>