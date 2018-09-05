<?php
include 'nav/nav_admin.login.php';
?>
<!DOCTYPE html>
<html >
  <head>

    <meta charset="UTF-8">
    <title>Avon Lake|Password Change</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <link href="css/stylelogin.css" rel="stylesheet" type="text/css">
    </head>
<body>

<div class="container">
   		<div class="row">
        	<div class="col-md-12">
           
                     <div class="login-container ">
                        <h2 class="form-title" style="color:#333333" align ="center">Change your password</h2>
                                                          
                                    <h4 align ="center"> find your account </h4><br>
                             
                                            
                           <form class="reset_pwd" action="reset_pwd.php" role="form" method="post">
                            <input type="text" class="form-control" id="sendemail" name="sendemail" placeholder="Email Address" required autofocus/> <br>
                             <input type="submit" id="send_submit" name="send_submit" value="Continue" class="btn btn-primary center-block" style="background-color:#B01313; border-color:#B01313" />

                            </form></label>
                            
               		 </div><!-- end login-container -->
			
     			 </div><!-- /.col -->
    		</div><!-- /.row -->
		</div><!-- /.container -->
  </body>
</html>