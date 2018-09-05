<?php 
include '../conn.php';
$id = $_REQUEST['id'];
// Delete record
$query = "select * from issue_types where user_id ='$id'";				
	$check = mysqli_query($conn,$query);													
    if(mysqli_num_rows($check)===0)
	{
    $query = "DELETE from users WHERE id=".$id;
    mysqli_query($conn,$query);
     if(query)
	{
	header("location: existingpointperson.php");								
	}
	}					
	else
	{
	header("location: existingpointperson.php?VAL=fail&RES=userexist&user_id1=$id");
	}

	$conn->close();

?>