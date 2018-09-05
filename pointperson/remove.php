<?php 
include 'conn.php';
if($_POST['id'])
{
$id = $_POST['id'];
// Delete record
$query = "update issues set issue_solved =1, issue_solveddate=now()  WHERE id=".$id;
mysqli_query($conn,$query);

}
die("hi");
header("location: fetchissues.php");
?>