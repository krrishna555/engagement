<?php header('Content-Type: application/json');
include '../conn.php';
//print_r($_POST);
if(isset($_POST)){
$category_id = $_POST['category_id'];
$type_id = $_POST['subcategory_id'];
$locationp = $_POST['locationp'];
$notes = $_POST['notes'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$contact_email = $_POST['contact_email'];
$telephone = $_POST['telephone'];
//Image upload

$target_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$file_name = $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

 move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


	$insert_query = "INSERT into `issues` (category_id,type_id,image_url,location,notes,first_name,last_name,contact_email,telephone,created_at) VALUES ('$category_id','$type_id','$file_name','$locationp','$notes','$first_name','$last_name','$contact_email','$telephone',now())";
//	echo("$insert_query"); die('hi');
	$result = mysqli_query($conn,$insert_query);
	$queryiss = "SELECT * from issue_types where id='$type_id'";
$resultiss = mysqli_query($conn, $queryiss) or die ( mysqli_error());
$rowiss = mysqli_fetch_assoc($resultiss); 
$idname = $rowiss['user_id'];
$queryemail = "SELECT * from users where id='$idname'";
$resultemail = mysqli_query($conn, $queryemail) or die ( mysqli_error());
$rowemail = mysqli_fetch_assoc($resultemail); 
$useremail = $rowemail['email'];
 //print_r($useremail); die('hi');
	if($result)
	{
	echo json_encode("success");
    $msg = "Issue has been recieved we will let you know once it is resolved";
	$subject = "Issue Location : ".$locationp;
    $msg = wordwrap($msg,70);
    mail($contact_email,$subject,$msg);
    $msg2 = "please have a look new issue recieved at location:".$locationp;
	$subject2 = "Issue Location : ".$locationp;
    $msg2 = wordwrap($msg2,70);
    mail($useremail,$subject2,$msg2);
	
if($_POST['source']==1)	{
	header("location: ../issue/issuereport.php");
}	
	}
	else{
		echo json_encode("The form no submitted");	
		
	}

    mysqli_close($conn);
		}
?>