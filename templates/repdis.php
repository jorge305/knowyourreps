



    <table class="table table-striped">
    <tr>
    <th class="text-center">Rep</th>
    <th class="text-center">Office</th>
    <th class="text-center">Party</th>
    
    <th class="text-center">Facebook</th>
    <th class="text-center">Twitter</th>
    <th class="text-center">Contact</th>
    </tr>
<?php    
for ($i = 0; $i < sizeof($_SESSION['reps']); $i++) 
  {
  print "<tr>
  <td><a href='{$_SESSION['reps'][$i]['urls'][0]}'>{$_SESSION['reps'][$i]['name']}</a></td>
  <td>{$_SESSION['reps'][$i]['office']}</td> 
  <td>{$_SESSION['reps'][$i]['party']}</td>";
  //<td>{$_SESSION['reps'][$i]['urls'][0]}</td>
  
  
  $sz_of_channels = sizeof($_SESSION['reps'][$i]['channels']);
   
   print "<td>";
   
   if (isset($_SESSION['reps'][$i]['channels']))
   {
        for ($j = 0; $j < $sz_of_channels; $j++)
        { 
            if ($_SESSION['reps'][$i]['channels'][$j]->type == "Facebook")
            {
            
            //<a href='<www.facebook.com/{$_SESSION['reps'][$i]['channels'][$j]->id}>Facebook</a></li>'
                //print "<li>www.facebook.com/{$_SESSION['reps'][$i]['channels'][$j]->id}</li>";
                 
                  print "<a href='http://www.facebook.com/{$_SESSION['reps'][$i]['channels'][$j]->id}'>Facebook</a>";  
            
            }
    /*        
            if ($_SESSION['reps'][$i]['channels'][$j]->type == "Twitter")
            {
                print "<td>www.twitter.com/{$_SESSION['reps'][$i]['channels'][$j]->id}</td>";
            }
      */
        }           
   }
   
   print "</td><td>"; 
   
    if (isset($_SESSION['reps'][$i]['channels']))
   {
        for ($j = 0; $j < $sz_of_channels; $j++)
        { 
            /*
            if ($_SESSION['reps'][$i]['channels'][$j]->type == "Facebook")
            {
            
            //<a href='<www.facebook.com/{$_SESSION['reps'][$i]['channels'][$j]->id}>Facebook</a></li>'
                //print "<li>www.facebook.com/{$_SESSION['reps'][$i]['channels'][$j]->id}</li>";
                 
                  print "www.facebook.com/{$_SESSION['reps'][$i]['channels'][$j]->id}";  
            
            }
            */
            
            if ($_SESSION['reps'][$i]['channels'][$j]->type == "Twitter")
            {
                print "<a href='http://www.twitter.com/{$_SESSION['reps'][$i]['channels'][$j]->id}'>Twitter</a>";
            }
      
        }           
   }
  
  print "</td>";
  
  
  print "<td><a tabindex='0' class='btn btn-primary' data-container='body' data-html='true' role='button' data-toggle='popover' data-trigger='focus' data-placement='left'  title='Contact Information'  
  data-content='<ul>";
  
  if (isset($_SESSION['reps'][$i]['phones'][0]))
  {
  print "<li><b>Phone:</b> {$_SESSION['reps'][$i]['phones'][0]} </li>";
  }
  
  if (isset($_SESSION['reps'][$i]['address'][0]))
  {
    print "<li><b>Address:</b> {$_SESSION['reps'][$i]['address'][0]->line1} <br>";
    
    if (isset($_SESSION['reps'][$i]['address'][0]->line2))
        {
        print "{$_SESSION['reps'][$i]['address'][0]->line2}<br>";
        }
        
    print "{$_SESSION['reps'][$i]['address'][0]->city}, {$_SESSION['reps'][$i]['address'][0]->state} {$_SESSION['reps'][$i]['address'][0]->zip}</li>";
    }
    
    
    if (isset($_SESSION['reps'][$i]['email'][0]))
        {
        print "<li><b>Email:</b> {$_SESSION['reps'][$i]['email'][0]}</li>";
        }
        
   $sz_of_channels = sizeof($_SESSION['reps'][$i]['channels']);
 /*  
   if (isset($_SESSION['reps'][$i]['channels']))
   {
        for ($j = 0; $j < $sz_of_channels; $j++)
        { 
            if ($_SESSION['reps'][$i]['channels'][$j]->type == "Facebook")
            {
            
            //<a href='<www.facebook.com/{$_SESSION['reps'][$i]['channels'][$j]->id}>Facebook</a></li>'
                //print "<li>www.facebook.com/{$_SESSION['reps'][$i]['channels'][$j]->id}</li>";
                 
                  print "<li>www.facebook.com/{$_SESSION['reps'][$i]['channels'][$j]->id}</li>";  
            
            }
            
            if ($_SESSION['reps'][$i]['channels'][$j]->type == "Twitter")
            {
                print "<li>www.twitter.com/{$_SESSION['reps'][$i]['channels'][$j]->id}</li>";
            }
      
    }   
   }         
    */
    
  print "</ul>'>Click for Contact Info</a></td>
  
  </tr>";
  }
    
?>
</table>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
