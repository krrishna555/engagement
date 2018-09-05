
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="favicon.ico">-->
    <title>Avon Lake</title>
   <meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no' />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>

.navbar-fixed-top {
    height: 120px;
}
.navbar-nav {
   padding-top: 30px;
   padding-right: 50px;
	padding-bottom: 40px;
	border
}
#navbar-toggle {
   top:17px;  
   
}
.navbar.navbar-default {
  
  background: white;
  border: none;
  border-bottom: 6px solid #B01313 !important;

}
.navbar.navbar-default .navbar-nav > li > a,
.navbar.navbar-default .navbar-brand {
  color: white;
}
.navbar.navbar-default .navbar-collapse {
  border: none;
  box-shadow: none;
}

.nav > li > a:hover, .nav > li > a:focus {
  background-color: #D02942;
  text-decoration: none;
}
@media screen and (min-width:500px) and (max-width:770px){
#icon{
    padding-left: -40px;
	margin-top:-15px;
	height=75px;
   }
.navbar  {
    height: 110px;
  }
  .navbar-nav{
	padding-right: 0px;
}

    #navul{
	 margin-top:22px;
  }
 
}
@media screen and (min-width:320px) and (max-width:500px){

#icon{
    padding-left: -40px;
	margin-top:-5px;
	width:250px;
	height=40px;
   }
.navbar  {
    height: 80px;
  }
.navbar-nav{
	padding-right: 0px;
}

    #navul{
	 margin-top:0px;
  }
   
}
@media screen and (min-width:240px) and (max-width:320px){
 #icon{
    padding-left: -40px;
	margin-top:0px;
	width:150px;
	height=40px;
   }
.navbar  {
    height: 80px;
  }
  .navbar-nav{
	padding-right: 0px;
}

    #navul{
	 margin-top:0px;
  }
	
   }
}
	
</style>
</head>
 <body>

    <nav class="navbar navbar-default navbar-static-top" style="background-color:#FFFFFF">
      <div class="navbar-header">
          <button type="button" id ="navbar-toggle" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="pointperson.php"> <img id="icon" src="../../images/logo.png" alt="logo"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id = "navul" class="nav navbar-nav navbar-right" >
		  <li><a href="../../logout.php" style="background-color:#B01313"><font color="FFFFFF">Signout</font></a></li>
            
            
         </ul>
         
        </div><!--/.nav-collapse -->
    </nav>
</body>
</html>