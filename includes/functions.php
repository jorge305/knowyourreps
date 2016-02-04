<?php

    /**
     * functions.php
     *
     * Computer Science 50
     * Problem Set 7
     *
     * Helper functions.
     */

    


function render($template, $values = [])
    {
        //echo("THE FUNCTION");
        // if template exists, render it
        if (file_exists("../templates/$template"))
        {
            //echo("FILE EXIST");
            // extract variables into local scope
            extract($values);

            // render header
            require("../templates/header.php");

            // render template
            require("../templates/$template");

            // render footer
            require("../templates/footer.php");
        }

        // else err
        else
        {
             //print( "FILE DOES NOT EXIST");
            trigger_error("Invalid template here: $template", E_USER_ERROR);
        }
    }
    
    
?>    
