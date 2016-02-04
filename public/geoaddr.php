

<?php

 // The global $_POST variable allows you to access the data sent with the POST method
  // To access the data sent with the GET method, you can use $_GET
   // ensure proper usage
    if (!isset($_GET["address"]))
    {
        http_response_code(400);
        exit;
    }
  
  $address = htmlspecialchars($_GET["address"]);
 

  //echo  $address;
  
  $first = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
  
  $first .= urlencode($address);
  
  

  //echo ($first);
  
  
  
 $geo = file_get_contents($first);
 
 $latlong = (json_decode($geo));
/*
 var_dump($latlong);
 var_dump($latlong->results);

 var_dump($latlong->results[0]->geometry->location);
*/
 // output articles as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($latlong->results[0]->geometry->location, JSON_PRETTY_PRINT));

 ?>