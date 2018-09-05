<?php
include 'conn.php';
// Check connection

 include 'nav_admin.signout.php';
  //include 'pointpersonsidebar.php';

if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id']){
    $user_id=$_SESSION['id'];
}else{
    header("location: ../login.php");
    die();
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

.main { 
  top:92px;
    bottom: 0;
   width:100%
    height: 100%;
	
    }


</style>	
</head>
<body>
<body>

<div class="main col-md-6 col-md-offset-2 col-xs-6 col-lg-6" >
<div class="container">
<div class = "row">
<div class = "col-md-4 col-md-offset-2">
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
                                        

  <h2 class="from-title" align="center">you are related to the following Categorty types</h2>

<?php
$sql = "SELECT * from issue_types where user_id='$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { ?>

  
            <a href='pointperson.php?id=<?php echo $row[id];?>' style='background-color:#c2c2a3' class='btn btn-default btn-block' ><font color="blue"><?php echo $row[issue_typename];?></font><span class='glyphicon glyphicon-chevron-right'></span></a></br></br>
			<?php
    }
} else {
    echo "0 results";
}

?>
	  
		  
		

  </div>
  </div>
  </div>
</div>
</body>
</html>