<?php

function render($template)
    {
        
        // if template exists, render it
        if (file_exists("finalproject/$template"))
       {
            // extract variables into local scope
            //extract($values);
            
            // render header
            //require("../templates/header.php");
 
            // render template
            require("/$template");
 
            // render footer
            //require("../templates/footer.php");
        }
 
        // else err
        else
        {
            
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    
    }
    
    
  


?>
