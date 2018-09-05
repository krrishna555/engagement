<?php
header('Content-Type: application/json');
include '../conn.php';
$city_id = $_POST['city_id'];
$sql = "SELECT * FROM headers where city_id = $city_id";
$sqld = "SELECT * FROM navigation where city_id = $city_id";
$sqlc = "SELECT * FROM  issue_categories where city_id = $city_id";
if($record_set_loc=$conn->query($sql)){
while($record_loc=$record_set_loc->fetch_assoc()){

	
    $nav = array('web_address' => "".$record_loc['web_address']."",
	                 'city_name' => "".$record_loc['city_name']."",
                    'text_header' => "".$record_loc['text_header']."",
					'iconimage_url' => "".$record_loc['iconimage_url']."",
                    'links'=>array(),
					'category'=>array()
					
    );
if($record_setd=$conn->query($sqld)){
while($recordd=$record_setd->fetch_assoc()){
    $href = $recordd['href'];
    $title = $recordd['title'];
    $type = $recordd['type'];
	$image = $recordd['image'];
    $que_arr = array('href'=>$href,'title'=>$title,'type'=>$type,'image'=>$image);
    array_push($nav['links'],$que_arr);
    }
}

if($record_setc=$conn->query($sqlc)){
while($record=$record_setc->fetch_assoc()){
    $category_name = $record['category_name'];
    $id1 = $record['id'];
	 
	 $sqlsd = "SELECT * FROM  issue_types where category_id=$id1";
	 if($record_setd=$conn->query($sqlsd)){
		  $que_arrd=array();
	while($recordd=$record_setd->fetch_assoc()){
	$issue_typename = $recordd['issue_typename'];
    $id = $recordd['id'];	
	 $que_arrd[] = array('name'=>$issue_typename,'id'=>$id);
   // array_push($nav['category']['subcategory'],$que_arrd);	
	}
	 }
    $que_arr = array('name'=>$category_name,'id'=>$id1,'subcategory'=>$que_arrd);
    array_push($nav['category'],$que_arr);
    }
}
}
echo json_encode($nav);
}
$conn->close();
?>