<?php 
require_once('../conn.php');
 $category_id = mysql_real_escape_string($_POST['category_id']);

echo $category_id;
} ?>