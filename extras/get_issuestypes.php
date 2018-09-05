<?php die("sdfs");
//require_once('../conn.php');
echo $category_id = mysql_real_escape_string($_POST['category_id']);
/* if($category_id!='')
{
echo $issues_result = $conn->query('SELECT id,issue_typename FROM issue_types where category_id='.$category_id.'');
$options = "<option value=''>Select IssueType</option>";
while($row = $issues_result->fetch_assoc()) {
$options .= "<option value='".$row['id']."'>".$row['issue_typename']."</option>";
}
echo $options;
} */?>