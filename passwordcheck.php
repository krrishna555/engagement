<?php
include 'conn.php';
	$sql = "SELECT * FROM users";
    $result1 = $conn->query($sql);
	mysqli_num_rows($result1)
	$res = $result1->fetch_assoc();
    $id = $res['id'];
if(isset($_POST['login_btn']))
{

    $password = $_POST['password'];

$insert_query = "Update `users` set password ='$password' Where id=$id";
	$result = mysqli_query($conn,$insert_query);

	if($result)
	{
	header("location: pointperson.php?id=$id");
	}
	else{
		echo("The form no submitted");	
		
	}

    mysqli_close($conn);
		}
?>
