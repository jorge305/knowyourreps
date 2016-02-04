<?php
  // The global $_POST variable allows you to access the data sent with the POST method
  // To access the data sent with the GET method, you can use $_GET
   // ensure proper usage
    if (!isset($_GET["address"]))
    {
        http_response_code(400);
        exit;
    }
  
  $say = htmlspecialchars($_GET["address"]);
  
  
 

  //echo  $say;
  
  
  
$response = http_get("https://www.googleapis.com/civicinfo/v2/representatives?address=10843+sw+69th+dr.+miami&key=", array("timeout"=>1), $info);
print_r($info);

  
  echo $info;

  
  header("Content-type: application/json");
    print(json_encode($info, JSON_PRETTY_PRINT));
    ?>
