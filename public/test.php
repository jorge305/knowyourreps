<?php

    require("../includes/config.php");
    
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
  
  $first = 'https://www.googleapis.com/civicinfo/v2/representatives?address=';
  $key = '&key=AIzaSyCo9wmbM7dx1BrccwM7xM1bxx0aGsZkO6E';
  $first .= urlencode($say);
  
  $first .= $key;

  //echo ($first);
  
  $_SESSION['addr'] = urlencode($say);
  //echo $_SESSION['addr'];
  
  
  
 $civics = @file_get_contents($first);
 
 if ($civics == null || $civics === false) {
 
    render("apology.php", ["title" => "Error Address", "message" => "Address not found"]);
    exit(); 
 }
 
 //var_dump($civics);
 
 $test = (json_decode($civics));
 
 //var_dump($test);
 
 //arrays for divisions/offices/officials
 $divisionh = [];
 $officen = [];
 $officialh = [];
 
 //echo $test->divisions->{'ocd-division/country:us'}->name;
 
 foreach ($test->divisions as $divisions => $division)
    {
        // add division info to array
       $divisionh[] = [
            "name" => (string) $division->name,
            "officeIndices" => (array) $division->officeIndices
        ];
    
      /*  echo $divisions;
        var_dump($division);
        echo '<hr />';
        
        echo $division->name;
        echo '<hr />';
        */
    }
    
  foreach ($test->offices as $offices => $office)
    {
        // add office info to array
       $officeh[] = [
            "name" => (string) $office->name,
            "officialIndices" => (array) $office->officialIndices,
           // "roles" => (array) $office->roles
        ];
    
      /*  echo $divisions;
        var_dump($division);
        echo '<hr />';
        
        echo $division->name;
        echo '<hr />';
        */
    }   
    
      foreach ($test->officials as $officials => $official)
    {
        // add officials info to array
       $officialh[] = [
            "name" => (string) $official->name,
           
            "address" => (isset($official->address)) ?
            (array) $official->address :
            null,
            
            "party" => (string) $official->party,
            
            "phones" =>  (isset($official->phones)) ? 
           (array) $official->phones : null,
           
            "urls" =>  (isset($official->urls)) ?
             (array) $official->urls : null,
            
            //"phones" => (array) $official->phones,
            
            "channels" => (isset($official->channels)) ?
            (array) $official->channels : null,
            
            "email" => (isset($official->emails)) ?
            (array) $official->emails: null
        ];
        
       /* if (isset($official->phones))
        {
            $officialh[] = [
                "phones" => (array) $official->phones
            ];
        }
    
      /*  echo $divisions;
        var_dump($division);
        echo '<hr />';
        
        echo $division->name;
        echo '<hr />';
        */
    } 
    

// var_dump($divisionh);
 //var_dump($officeh);
 //var_dump($officialh);
 
 //var_dump($officialh);

  //echo $officialh[0]['address'][0]->city;
  
  /*foreach ($officialh as $name => $rep)
  
  {
  print "<div id='FederalRep'>$name->$rep['name']</div>";
  }
  */
  
  
  // add in office to officialh array
for ($i = 0; $i < sizeof($officialh); $i++) 
{

    
       
        for ($j = 0; $j < sizeof($officeh); $j++)
            {
            if (in_array($i, $officeh[$j]['officialIndices']))
                {
                $officialh[$i] += [
                "office" => (string) $officeh[$j]['name']
                ];
                }     
            }
}
 

  
  $_SESSION['id'] = 1;
  $_SESSION['reps'] = $officialh;
 // $_SESSION['office'] = $officeh;
  
  //echo $_SESSION['reps'][0]['name'];
  
  //http_redirect("repdis.php",,true,HTTP_REDIRECT_PERM);
  
  //header("Location: http://finalproject/repdis.php");
    //die();
 /*   if (file_exists("../templates/repdis.php"))
    {
    print("repdis exist");
    }
    else 
    {
    print("does not repdis exist");
    }
    
    if (file_exists("../includes/functions.php"))
    {
    print("functions exist");
    }
    else 
    {
    print("does not func exist");
    }
    
    if (file_exists("../templates/header.php"))
    {
    print("header exist");
    }
    else 
    {
    print("does not header exist");
    }
   */ 
    render("repdis.php",["title" => "Your Representives"]);
  
  
  
  //echo "https://www.googleapis.com/civicinfo/v2/representatives?address={$say}&key="
  //header("Content-type: application/json");
    //print(json_encode($civics, JSON_FORCE_OBJECT));
    ?>
