<!DOCTYPE html>
<html>
  <head>
        <?php 
        require("../includes/config.php");
        
        if (!isset($_SESSION['addr']))
        {
            render("apology.php", ["title" => "Error Address", "message" => "Please enter an address or zip code to view your representatives on the map"]);
            exit(); 
        } 
        ?>
            <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>

        <!-- app's own CSS -->
        <link href="/css/styles.css" rel="stylesheet"/>

        <!-- http://jquery.com/ -->
        <script src="/js/jquery-1.11.1.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>


               <script 
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo9wmbM7dx1BrccwM7xM1bxx0aGsZkO6E">
    </script>
    <script src="/js/spidermaps.js"></script>
    
    <div id="domtarget" style="display: none;">
            <?php 
            
            echo $_SESSION['addr']; 
            ?>
            
            </div>
    
      <script src="/js/googmaps_4.js">

    </script>
    <div class="container">
    <div id="top">
                <a href="/"><h1>Know your reps</h1><img alt="Know your reps" src="https://store-images.s-microsoft.com/image/apps.25828.13510798882934059.7fd728bf-4817-4b2d-b115-2201b8d1c7f9.c83b81a8-3698-4c57-b2d5-186cdbffd231?w=191&h=191"/></a>
            
            </div>
    </div>
    <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="/">Home</a></li>
                    <li role="presentation"><a href="/maptest_2.php">Map</a></li>
                </ul>
            </div>
            </nav>
            
            
    
  </head>
  <body>
   
    <table border="1" style="width: 100%; height: 100%;"> 
      <tr> 
        <td> 
    <div id="map"></div>
        </td>
        <td valign="top" style="width:25%; text-decoration: underline; color: #4444ff;"> 
           <div id="side_bar"></div> 
        </td> 
         </tr> 
    </table>
   <!--  -->
  

   
  </body>
</html>
