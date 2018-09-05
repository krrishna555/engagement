<?php
include '../conn.php';
if(isset($_POST['submit']))
{
    $nameArr = $_POST['first_name'];
	$lnameArr = $_POST['last_name'];
    $emailArr = $_POST['email'];
	 $editid = $_POST['edit_id'];
/* $insert_query = "INSERT into `users` (first_name,last_name,email,remember_token) VALUES ('$nameArr','$lnameArr','$emailArr','$a')"; */
 $update_query = "UPDATE `users` set first_name='$nameArr',last_name ='$lnameArr', email='$emailArr' where id=$editid";
 $result = mysqli_query($conn,$update_query);
	
	if($result)
	{   
	header("location: existingpointperson.php");  
	}

	
    mysqli_close($conn);
}
?>
