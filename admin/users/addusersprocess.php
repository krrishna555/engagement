<?php
include '../conn.php';
function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}
if(isset($_POST['submit']))
{
    $nameArr = $_POST['first_name'];
	$lnameArr = $_POST['last_name'];
    $emailArr = $_POST['email'];
 $a = random_str(32);
$insert_query = "INSERT into `users` (first_name,last_name,email,remember_token) VALUES ('$nameArr','$lnameArr','$emailArr','$a')";
	$result = mysqli_query($conn,$insert_query);
	
	if($result)
	{   
$verify_link= "https://engagement.emergeinc.com/verfy.php?t=".$a;
	$msg = "Click here to generate your password \n".$verify_link;
	$subject = "Issue Location : ";
      $msg = wordwrap($msg,70);
	  $a = random_str(32);
    mail($emailArr,$subject,$msg);
	header("location: addusers.php?LOGIN_VAL=sucess&RES=PasSNomTch");
    
	}
	else{
		header("location: addusers.php?LOGIN_VAL=sucess&RES=emailexists");	
		
	}

    mysqli_close($conn);
		}
?>
