<?php 
include 'conn.php';
if(!isset($_SESSION)){
	session_start();
}
if(isset($_POST['login_btn']))
{
if(isset($_POST['email']) &&($_POST['pwd']))
{
	$email = $_POST['email'];
	$password = md5($_POST['pwd']);	
	$sql = "SELECT * FROM users where email='$email' and password='$password'";
    $result = $conn->query($sql);
	if(mysqli_num_rows($result)===1)
	{
	$res = $result->fetch_assoc();
	$user_id = $res['id'];
	session_start();
	$_SESSION['id']=$user_id;
	$usertype = $res['usertype'];
	$_SESSION['usertype'] = $res['usertype'];
  //  $id = $res['id'];
	//$usertype = $res['usertype'];


	if($usertype==1){
			header("location: home.php");
			$_SESSION['isLogged'] = true;
		}else{
			header("location: pointperson/pointperson.php");
			
	}
	 }

	else
	{  
     header("location: login.php?LOGIN_VAL=fail&RES=PasSNomTch");
        
	 }
}
}
$conn->close();
?>