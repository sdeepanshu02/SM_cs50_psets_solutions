<?php
    // configuration
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // get number of shares from what companies for current user
        $rows = CS50::query("SELECT symbol, shares FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
        
        // lookup stock name and price based off symbol and put together an associative array to pass to the view
        $positions = [];
        foreach ($rows as $row)
        {
            $stock = lookup($row["symbol"]);
            if ($stock !== false)
            {
                $positions[] = [
                    "name" => $stock["name"],
                    "price" => $stock["price"],
                    "shares" => $row["shares"],
                    "symbol" => $row["symbol"]
                ];
            }
        }
        // get total cash for current user
        $hard_earned = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        // render portfolio
        render("portfolio.php", ["positions" => $positions, "hard_earned" => $hard_earned, "title" => "Portfolio"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (preg_match("/^\d+$/", $_POST["add"]) != true) {
            apologize("Enter a valid amount");
        }
        else {
            CS50::query("UPDATE users SET cash = cash + ? where id = ?", $_POST["add"], $_SESSION["id"]);
            render("added_funds.php", ["title" => "add funds", "added" => $_POST["add"]]);
        }
    }
?>