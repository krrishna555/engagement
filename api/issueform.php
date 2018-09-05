<?php
//header("Content-Type: multipart/form-data");
header('Content-Type: application/json');
include '../conn.php';
//define(‘ROOT’, dirname(__FILE__).DIRECTORY_SEPARATOR.”upload”);
	$filetype = $_FILES["file"]["type"];
	if($filetype == 'image/jpeg'){ 
		$type = '.jpg'; 
	} 
	if ($filetype == 'image/jpg') { 
		$type = '.jpg'; 
	} 
	if ($filetype == 'image/pjpeg') { 
		$type = '.jpg'; 
	} 
	if($filetype == 'image/gif'){ 
		$type = '.gif'; 
	} 
	if($filetype == 'image/png'){ 
		$type = '.png'; 
	} 
$uploaddir = '/var/www/vhosts/engagement.emergeinc.com/apps/EmergeEngagement/httpdocs/';
$category_id = $_POST['category_id'];
$type_id = $_POST['type_id'];
$locationp = $_POST['locationp'];
$notes = $_POST['notes'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$contact_email = $_POST['contact_email'];
$telephone = $_POST['telephone'];
$file = $_POST['file'];
$upload = 'images/images/'.$title.$type;
if (move_uploaded_file($_FILES['file']['tmp_name'],$uploaddir.$upload)) {
 	$insert_query = "INSERT into `issues` (category_id,type_id,image_url,location,notes,first_name,last_name,contact_email,telephone) VALUES ('$category_id','$type_id','$upload','$locationp','$notes','$first_name','$last_name','$contact_email','$telephone')";
	//echo('insert_query'); die('hi');
if (mysqli_query($conn,$insert_query)){
	echo json_encode(array('result'=>'true'));
}else{
	echo json_encode(array('result'=>'false'));
}
}else{
 	echo json_encode(array('result'=>'false'));
	  }
$conn->close();
?>
