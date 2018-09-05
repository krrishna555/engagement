<?php 
include '../conn.php';
if($_GET['id'])
{
$id = $_GET['id'];
$status = $_GET['status'];
$date = date("Y-m-d H:i:s") ;
// Delete record
$query = "update issue_categories set is_active =$status WHERE id=".$id;
mysqli_query($conn,$query);
header("location: issueadmin.php");

}
?>