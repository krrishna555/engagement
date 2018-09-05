<?php 
include '../conn.php';
if($_POST['id'])
{
$id = $_POST['id'];
$date = date("Y-m-d H:i:s") ;
// Delete record
$query = "update issues set issue_solved =0, updated_at='$date' WHERE id=".$id;
mysqli_query($conn,$query);
header("location: issueadmin.php");
}
?>