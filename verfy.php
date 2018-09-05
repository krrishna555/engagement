<?php
include 'nav/nav_admin.signout.php';
?>
<?php
include 'conn.php';
$token = $_GET['t'];
$sql = "SELECT * FROM users WHERE remember_token='".$token."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html >
  <head>

    <meta charset="UTF-8">
	<title>AL Engagemenet</title>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
  <h1 class="from-title" align="center">Enter Password</h1>
                            <p align ="left" style="color:white">Create new password</p>
                            <p class="error-message">                                        
								<?php
                                    if(isset($_GET['RES']))
                                    {
                                        if($_GET['RES']=='PasNoEq'){echo "Two passwords are not same, please check them again.";}
                                        else if($_GET['RES']=='UrINacTIVe'){echo "This account is inactive. Contact emergeengagement123@gmail.com.";}
                                        if($_GET['RES']=='NOuseRiDfOUnd'){echo "Email Address is not found. Make sure you're using the Email Address sent by emerge engagement.";}
                                    }
                                ?>                                       
                             </p>
                                            
                           <form class="login" action="verfy.php?t=<?php echo $token; ?>" role="form" method="post">
						   <label for="password">New Password:</label>
                             <label for="login_password"style ="display:NONE">New Password</label><input type="password" id="new_password" name="new_password" class="form-control" placeholder="New Password" required/></br>
							 <label for="password">Re-enter Password:</label>
                             <label for="login_password"style ="display:NONE">Re-enter Password</label><input type="password" id="re_enter_password" class="form-control" name="re_enter_password" placeholder=" Re-enter Password" required/>
				<!--<input type="hidden" name="t" value="<?php echo $token; ?>">--></br>
                             <label for="login_submit"style ="display:NONE">Submit</label><input type="submit" id="submit" name="submit" value="Reset Password" class="btn btn-success btn-sm" style="background-color:#ff9933;border-color:#ff9933" />
                                                        


                            
                            </form></lablel>
                            
               		 </div><!-- end login-container -->
			
     			 </div><!-- /.col -->
    		</div><!-- /.row -->
		</div><!-- /.container -->

<?php 
if(isset($_POST['submit'])){
$token = $_GET['t'];
$new_pwd = md5($_POST['new_password']);
$re_pwd = md5($_POST['re_enter_password']);
if($new_pwd != $re_pwd){
	header("location: verfy.php?RES=PasNoEq&t=$token");
}else{
	$sql_update = "UPDATE users SET Password='".$new_pwd."' WHERE remember_token='".$token."' AND email='".$row['email']."'";
	//var_dump($sql_update); //exit;
	$result_update = $conn->query($sql_update);
	if($result_update){
		echo "<script>alert(\"reset successfully\");window.location.href=\"login.php\"</script>";
	}
}
}
?>
