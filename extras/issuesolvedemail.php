<?php 
include("conn.php");
if(isset( $_REQUEST['send_user']))
{
 $id = $_REQUEST['send_user'];
 $id2 = $_REQUEST['id'];
$query = "SELECT * from issues where id=$id";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$msg = "Hi, your issue has been resolved please see";
	$subject = "Issue Location : ".$locationp;
      $msg = wordwrap($msg,70);
    if(mail($row['contact_email'],$subject,$msg))
		{
		$update="UPDATE issues set issue_solvedemail='1' where id='$id'";
     $result = mysqli_query($conn, $update) or die(mysqli_error());
	
	
	}
	header("location: fetchissues.php?id=$id2");
}

?>