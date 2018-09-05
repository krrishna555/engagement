<?php
include 'nav/nav_admin.login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <!-- <link rel="icon" href="favicon.ico">-->
	<!--<base target="_blank">-->
<title>Home files</title>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link href="css/stylelogin.css" rel="stylesheet" type="text/css">
	<style>

 .login-container {
	background-color: #FFFFFF;
	max-width: 400px;
	margin: auto;
	margin-top: 50px;
	padding: 10px;
	
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	
}
.login_btn
{
	border-color: #ff9933;
}
  
  
	</style>

</head>
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
<div id='login-container' class="login-container">
  <h1 class="from-title" align="center">Log-In</h1>
  <p class="error-message">                                        
	<?php
        if(isset($_GET['RES']))
            {
                if($_GET['RES']=='PasSNomTch'){echo "Invalid Email or Password.";}
                else if($_GET['RES']=='usernotexits'){echo "User does not exist";}
                else if($_GET['RES']=='success'){echo "Registration Success. Please log in";}
				else if($_GET['RES']=='nopermission'){echo "please login!!";}
            }
             ?>   
  <form action="loginprocess.php" role="form" method="POST">
    <div class="form-group login">
      <label for="email">Email:</label>
      <input type="text" class="form-control"  id="email" name="email" style="color:#EE2C49" placeholder="Enter email" required autofocus/>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" style="color:#EE2C49" placeholder="Enter password" required autofocus/>
    </div> 
   <!-- <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>-->
<div class="checkbox">
 <label>
<input type="checkbox" style="color:#3366ff"> Remember me</label>
 </div>
    <button for="login_btn" type="submit" id="login_btn" name="login_btn" style="background-color:#B01313" class="btn btn-primary btn-md btn-block">Login</button>
</br>
 <a href="changepass.php" class="text-right new-account" style="color:#3366ff">Forgot password? </a>
  </form>
  </div>
  </div>
  </div>
</div>

</body>
</html>