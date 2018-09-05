<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["issue_categories_id"])) {
	$query ="SELECT * FROM issue_types WHERE category_id = '" . $_POST["issue_categories_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select issuetype</option>
<?php
	foreach($results as $issue_types) {
?>
	<option value="<?php echo $issue_types["id"]; ?>"><?php echo $issue_types["issue_typename"]; ?></option>
<?php
	}
}
?>