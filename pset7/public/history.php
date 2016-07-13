<?php
    // configuration
    require("../includes/config.php"); 
    
    // get number of shares from what companies for current user
    $histories = CS50::query("SELECT * FROM history WHERE user_num = ?", $_SESSION["id"]);
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        render("purchase_history.php", ["title" => "history", "histories" => $histories]);
    }
    else {
        apologize("I do not know what the problem is");
    }
?>