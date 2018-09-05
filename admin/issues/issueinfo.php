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
include '../../nav/nav_admin.signout.php'; 
$locationid = $_REQUEST['locationid'];
$query = "SELECT * from issues where id='$locationid'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result); 
$upload_url = "https://".$_SERVER['HTTP_HOST']."/uploads/";?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<title>AL Engagemenet</title>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" media="all" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmf4uawmYkFGmAEO6XVvyuT_c7BC771o0"></script>
    <link rel="stylesheet" href="../../css/print.css" media="print">
	<style>
	

	#map{
    width: 400;
    height: 200px;
}
#tagsleft{
	color:#777777;
	font-weight: normal;
}

h4 {
     font-size: 1.1em;
    font-weight: normal;
}
#tagsright{
	color:#333333;
	font-weight: 550;
	font-size: 1.1em;
}
.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
.text * {
    padding-left: 15px ;
}
#url3 * {
    padding-top: 4px ;
}


</style>

   <!-- <link href="font-awesome.css" rel="stylesheet" type="text/css">-->  
</head>
<body>
<script>
var myCenter = new google.maps.LatLng(37.422230, -122.084058);
function initialize(){
    var mapProp = {
        center:myCenter,
        zoom:12,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map"),mapProp);

    var marker = new google.maps.Marker({
        position:myCenter,
    });

    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>
$(document).on('click','.delete',function(){
	
var element = $(this);
var del_id = element.attr("id");//alert(del_id);
var info = 'id=' + del_id;
if(confirm("Are you sure you want to update this to issue resolved"))
{
 $.ajax({
   type: "POST",
   url: "remove.php",
   data: info,
   success: function(){

 }
});
  window.location=document.referrer;
 }
return false;
});
</script>
</br>
<div class="main col-md-10 col-md-offset-2 col-xs-12 col-sm-12 col-lg-8" >
<div class="noprint" id="url3" style="background-color:#E6E7E7;"><center><h4><a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $row['contact_email'];?>&su=Avon lake engagement issue recieved&body=Hello Thanks for submitting the issue at location<?php echo $row['location'];?>. we will email you once the issue is resolved. Thanks "><u>Send Issue Recieved Email</u></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $row['contact_email'];?>&su=Avon lake engagement issue resolved&body=Hello Your issue at location <?php echo $row['location'];?> is resolved. Thanks "><u>Send Issue Resolved Email</u></a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a id="<?php echo $row['id'] ?>" class="delete" name="issueresolved" value="issueresolved"><u>Mark Issue Complete</u></a> </h4></center></br></div></br>
<div class="row">
  <div class="col-sm-6">
<?php
if(!empty($row['image_url']))
//if(file_exists($upload_url))
{?>
  <img height="300" width="350" src="<?php echo  $upload_url.$row['image_url'];?>">   <?php
}
else
{ ?>
 <img height="300" width="350" src="<?php echo $upload_url.'noimage.png'?>">  <?php
} ?>
</div>
<div class="col-sm-6">
<div class="mapouter"><div class="gmap_canvas"><iframe width="400" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=emerge%20inc&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">webdesign agentur</a></div><style>.mapouter{text-align:right;height:200px;width:350px;}.gmap_canvas {overflow:hidden;background:none!important;height:200px;width:350px;}</style></div>
<div class="text" style="background-color:#DEB6D9; height:100px; width:350px; overflow: auto;"></br><h4><?php echo $row['location'];?></h4><h4>Coming Soon</h4></div>
</div>
            </div>
<br>
<div id="cont1" style="background-color:#B6C9DE;" class="container-fluid">
<form action="" role="form" method="POST">
<div class="row">
 <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-6 col-sm-3 nopadding">
               <h4 id="tagsleft" class="pull-right">Issue ID:&nbsp;</h4>
            </div>
                <div>
               <h4 id="tagsright"><?php if($row['id']<10){ 
			   echo "0000".$row['id'];
			   }
			   elseif($row['id']>=10 && $row['id']<100 ){ 
			   echo "000".$row['id'];
			   } 
			   elseif($row['id']>=100 && $row['id']<1000 ){
				   echo "00".$row['id'];
				   }
			  elseif($row['id']>=1000 && $row['id']<10000 ){
				   echo "0".$row['id'];
				   }
				    else{
				   echo $row['id'];
				   }
               ?></h4>
            </div>

    </div>
	 <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-6 col-sm-3 nopadding">
               <h4 id="tagsleft" class="pull-right">Reported Date:&nbsp;</h4>
            </div>
                <div class="col-xs-6 nopadding">
               <h4 id="tagsright"> <?php echo date('M d Y, h:i A', strtotime($row['created_at'])); ?></h4>
            </div>
        </div>
    </div>
        <div class="col-sm-12">
           <div class="row">
             <div class="col-xs-6 col-sm-3 nopadding">
               <h4 id="tagsleft" class="pull-right">Issue Type:&nbsp;</h4>
             </div>
                 <div class="col-xs-6 nopadding">
                    <h4 id="tagsright"><?php
			   $cat = $row['category_id'];
               $query1 = mysqli_query($conn,"SELECT issue_categories.id, issue_categories.category_name FROM issues INNER JOIN issue_categories ON issues.category_id = issue_categories.id where category_id=$cat");
			   //print_r($query1); die('hi');
                $row1 = mysqli_fetch_assoc($query1);
               

               ?>  <?php
					$type = $row['type_id'];
                     $query2 = mysqli_query($conn,"SELECT issue_types.id, issue_types.issue_typename FROM issues INNER JOIN issue_types ON issues.type_id = issue_types.id where type_id=$type");
                     $row2 = mysqli_fetch_assoc($query2);
 
                      echo $row1['category_name'];?>: <?php echo $row2['issue_typename'];
                      ?></h4>
			    </div>
             </div>
	</div>
	<div class="col-sm-12">
        <div class="row">
            <div class="col-xs-6 col-sm-3 nopadding">
               <h4 id="tagsleft" class="pull-right">Notes:&nbsp;</h4>
            </div>
            <div  class="col-xs-6 nopadding">
 <h4 id="tagsright">  <?php echo $row['notes'];?></h4></div>
    </div></div>
	
</div>

    </form>
</div>
        
  </div></br>
<div id="cont2" style="background-color:#B6DEBE;" class="container-fluid">
<div class="col-sm-12">
  <div class="row">
            <div class="col-xs-6 col-sm-3 nopadding">
               <h4 id="tagsleft" class="pull-right">Reported by:&nbsp;</h4>
            </div>
            <div>
 <h4 id="tagsright">  <?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h4></div>
</div></div>

	<div class="col-sm-12">
        <div class="row">
            <div class="col-xs-6 col-sm-3 nopadding">
               <h4 id="tagsleft" class="pull-right">&nbsp;</h4>
            </div>
            <div>
 <h4 id="tagsright">  <?php echo $row['telephone'];?></h4></div>
    </div>
	</div>
	<div class="col-sm-12">
        <div class="row">
            <div class="col-xs-6 col-sm-3 nopadding">
			<h4 id="tagsleft" class="pull-right">&nbsp;</h4>
            </div>
            <div class="col-xs-6 nopadding">
 <h4 id="tagsright"> <a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $row['contact_email'];?>&su=Avon lake engagement Issue"> <?php echo $row['contact_email'];?></a></h4></div>
    </div>
	</div>
</div>
  </div>
  </div>

  </div>
  </div>
  </div>
 

</br></br>

</body>
</html>

	