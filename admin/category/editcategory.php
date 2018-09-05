<?php 
include '../conn.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


//print_r($_REQUEST);

if($_REQUEST['issue_id'])
{
$category_id = $_REQUEST['id1'];
$issue_id = $_REQUEST['issue_id'];
 $query="delete from issue_types where id=$issue_id"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());

header("location: addcategory.php?id=".$category_id);
die();
}

if(isset($_POST)){
	
$category_id = $_POST['category_id'];
$issuestypes_id = $_POST['issuestypes_id'];	 
$category_name = $_POST['category_name'];
$issue_typename = $_POST['issue_typename'];//print_r($issue_typename );
$user_id = $_POST['user_id'];//print_r($issue_typename );die("sxdfsdf");
$dataarray = array("category_id"=>$category_id,"issuestypes_id"=>$issuestypes_id,"issue_typename"=>$issue_typename,"user_id"=>$user_id);//print_r($dataarray);//die("sdfs");
 $category_typename=$_POST['category_typename'];//print_r($category_typename);die("dffg");
if(!empty($_FILES["fileToUpload"]["name"])){
$target_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//die("dfgdgf");
$file_name = $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

 move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
 

if(!empty($category_name))
{
 $update_query1 = "UPDATE `issue_categories` set category_name='$category_name',icon_image='$file_name' where id=$category_id  ";
 
$result = mysqli_query($conn,$update_query1);
}
}

else{
	 $update_query1 = "UPDATE `issue_categories` set category_name='$category_name' where id=$category_id  ";
 
$result = mysqli_query($conn,$update_query1);
	
}
 
 //Image upload

	
foreach ($dataarray['issue_typename'] as $key=>$values)
{

$issuestypes_id = $dataarray['issuestypes_id'][$key];
$issue_typename = $values;
$user_id = $dataarray['user_id'][$key];

/*  $sql11 = "SELECT * from users where id='$user_id' limit 1 ";
 $result1 = mysqli_query($conn, $sql11);	
while( $row1 = mysqli_fetch_assoc($result1)){
$user_id = $row1['id'];
}
if(!isset($user_id)) { $user_id=0;} */

if(empty($issuestypes_id)||(!isset($issuestypes_id)))
{
  $insert_query = "INSERT into `issue_types` (issue_typename,category_id,user_id) VALUES ('$issue_typename',$category_id,'$user_id')";
$result = mysqli_query($conn,$insert_query);
}
 else {
 $update_query = "UPDATE `issue_types` set issue_typename='$issue_typename',user_id = $user_id where id=$issuestypes_id  ";
$result = mysqli_query($conn,$update_query);
	
} 
}
    mysqli_close($conn);
echo '<script type="text/javascript">'
			   , 'history.go(-2);'
			   , '</script>';

} 
 




?>