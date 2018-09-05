<?php 
include 'conn.php';
if($_POST['id'])
{
$id = $_POST['id'];
// Delete record
$query = "update issue_categories set is_active =1 WHERE id=".$id;
mysqli_query($conn,$query);

}
?>