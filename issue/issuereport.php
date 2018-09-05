<?php include '../nav/nav_admin.login.php'; 
include '../conn.php'; ?>
<?php
require_once("../dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM issue_categories";
$results = $db_handle->runQuery($query);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<title>AL Engagemenet</title>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link rel="css/stylesheet" href="style.css"> 
<style>
.container2
{
	margin-top:130px;
}
</style>	
</head>
<body>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "../get_issuetype.php",
	data:'issue_categories_id='+val,
	success: function(data){
		$("#state-list").html(data);
	}
	});
}
</script>
<div class="container2">
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
<div class="record-container">
  <h1 class="from-title" align="center">Enter a Issue</h1><br>
<form action="issueprocess.php" role="form" method="POST" enctype="multipart/form-data">
<div class="form-group">
<div class="frmDronpDown">
		<label>Category:</label><br/>
		<select id="country-list" name= "category_id" class="form-control" onChange="getState(this.value);" required/>
		<option value="">Select Category</option>
		<?php
		foreach($results as $issue_categories) {
		?>
		<option value="<?php echo $issue_categories["id"]; ?>"><?php echo $issue_categories["category_name"]; ?></option>
		<?php
		}
		?>
		</select>
</div><br>
<div class="form-group">
		<label>Issuetype:</label><br/>
		<select id="state-list" name= "subcategory_id" class="form-control" required/>
		<option value="">Select issuetype</option>
		</select>
</div>
</div>
    <div class="form-group">
      <label for="Location">Location:</label>
      <input type="text" class="form-control"  id="locationp" name="locationp" required/>
    </div>
	  <div class="form-group">
      <label for="image">Photo:</label>
      <input type="file" class="form-control" id="fileToUpload" name="fileToUpload">
    </div>
    
    <div class="form-group">
  <label for="notes">Notes:</label>
  <textarea class="form-control" rows="5" id="notes" name="notes"></textarea>
</div>
    <div class="form-group">
      <label for="firstname">First Name:</label>
      <input type="text" class="form-control"  id="first_name" name="first_name" required/>
    </div>
	<div class="form-group">
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control"  id="last_name" name="last_name" required/>
    </div>
		<div class="form-group">
      <label for="emailaddress">Email Address:</label>
      <input type="email" class="form-control"  id="contact_email" name="contact_email">
    </div>
			<div class="form-group">
      <label for="telephonenumber">Telephone number:</label>
      <input type="text" class="form-control" id="txtnumber" name="telephone" maxlength="12" placeholder="xxx-xxx-xxxx" />
    </div>
</div>
<br>
  <button for="submit_btn" type="submit" id="submit_btn" onSubmit="alert('Thank you for reporting the issue.')" name="submit_btn" class="btn btn-primary center-block">Submit</button>
 <input type="hidden"  name="source" value='1'>
    </form>
  </div>
  </div>
  </div>
</div>


<script>
$(function () {

            $('#txtnumber').keydown(function (e) {
             var key = e.charCode || e.keyCode || 0;
             $text = $(this); 
             if (key !== 8 && key !== 9) {
                 if ($text.val().length === 3) {
                     $text.val($text.val() + '-');
                 }
                 if ($text.val().length === 7) {
                     $text.val($text.val() + '-');
                 }

             }

             return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
         })
});
</script>

</body>
</html>