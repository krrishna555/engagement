<?php
include 'conn.php';
//print_r($_POST);
if(isset($_POST)){
$category_name = $_POST['category_name'];
    $nameArr = $_POST['category_typename'];
    $emailArr = $_POST['contact_email'];
//Image upload

$target_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$file_name = $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	$category_typename=$_POST['category_typename'];//print_r($category_typename);die("dffg");
	$insert_query = "INSERT into `issue_categories` (category_name,icon_image) VALUES ('$category_name','$file_name')";
//	echo("$insert_query"); die('hi');
	$result = mysqli_query($conn,$insert_query);
	$lastcategory_id = $conn->insert_id;
	foreach($category_typename as $key=>$values)
	{    $email = $emailArr[$key];
	if(!empty($values))
	{
$insert_query = "INSERT into `issue_types` (issue_typename,category_id,contact_email) VALUES ('$values','$lastcategory_id','$email')";
//	echo("$insert_query"); die('hi');
	$result = mysqli_query($conn,$insert_query);
	}
	}

 /* move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
 if(!empty($nameArr)){
        for($i = 0; $i < count($nameArr); $i++){
            if(!empty($nameArr[$i])){
                $name = $nameArr[$i];
                $email = $emailArr[$i];

	$insert_query = "INSERT into `issue_types` (issue_typename,contact_email) VALUES ('$name','$email')";
//	echo("$insert_query"); die('hi');
	$result = mysqli_query($conn,$insert_query); */
	if($result)
	{

	header("location: addcategory.php");
	
	}
	else{
		echo("The form no submitted");	
		
	}

    mysqli_close($conn);
		}
?>