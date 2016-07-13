<?php
    
    require("../includes/config.php");
   
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
       
        render("quote_lookup.php", ["title" => "Lookup"]);
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["quote"])) {
            apologize("You haven't entered anything.");
        }
        else {
            $stock = lookup($_POST["quote"]);
            if (isset($stock) && $stock != false) {
            render("quote_display.php", ["stock" => $stock]);
            }
            else {
                apologize("The symbol you've entered is not a valid stock option.");
            }
        }
    }
?>