<?php

$dir = "/uploads/Screenshot (1).png";


function readGPSinfoEXIF($image_full_name)
{
   $exif=exif_read_data($image_full_name, 0, true);
     if(!$exif || $exif['GPS']['GPSLatitude'] == '') {
       return false;
    } else {
    $lat_ref = $exif['GPS']['GPSLatitudeRef'];
    $lat = $exif['GPS']['GPSLatitude'];
    list($num, $dec) = explode('/', $lat[0]);
    $lat_s = $num / $dec;
    list($num, $dec) = explode('/', $lat[1]);
    $lat_m = $num / $dec;
    list($num, $dec) = explode('/', $lat[2]);
    $lat_v = $num / $dec;

    $lon_ref = $exif['GPS']['GPSLongitudeRef'];
    $lon = $exif['GPS']['GPSLongitude'];
    list($num, $dec) = explode('/', $lon[0]);
    $lon_s = $num / $dec;
    list($num, $dec) = explode('/', $lon[1]);
    $lon_m = $num / $dec;
    list($num, $dec) = explode('/', $lon[2]);
    $lon_v = $num / $dec;

    $gps_int = array($lat_s + $lat_m / 60.0 + $lat_v / 3600.0, $lon_s
            + $lon_m / 60.0 + $lon_v / 3600.0);
    return $gps_int;
    }
}


         function dirImages($dir)
         {
             $d = dir($dir);
             while (false!== ($file = $d->read()))
             {
             $extension = substr($file, strrpos($file, '.'));
             if($extension == ".jpg" || $extension == ".jpeg" || $extension == ".gif"                                        
               |$extension == ".png")
     $images[$file] = $file;
    }
    $d->close();        
    return $images;
}


$array = dirImages('./img');
$counter = 0;

foreach ($array as $key => $image)
{
    echo "<br />";
    $counter++;
    echo $counter;
    echo "<br />";
    $image_full_name = $dir."/".$key;
    echo $image_full_name;
    $results = readGPSinfoEXIF($image_full_name);
    $latitude = $results[0];
    echo $latitude;
            echo "<br />";
    $longitude = $results[1];
    echo $longitude;
    echo "<br />";   
}
?>
<!DOCTYPE html>
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>
<script>
var myCenter=new google.maps.LatLng(<?=$latitude;?>,<?=$longitude;?>);
var marker;
function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });
marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<div id="googleMap" style="width:500px;height:380px;"></div>
</body>
</html>