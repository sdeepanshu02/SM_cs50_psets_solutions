<?php
    // configuration
    require("../includes/config.php");
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form\
        $users_stock = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
        render("selling_stock.php", ["title" => "Sell", "users_stock" => $users_stock]);
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["sstock"])) {
            apologize("You haven't entered anything.");
        }
        else {
            $stock = lookup($_POST["sstock"]);
            $users_stock = CS50::query("SELECT * FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["sstock"]);
            if (isset($stock) && $stock != false && $users_stock != false) {
                // gets number of shares of said stock
                $shares = CS50::query("SELECT shares FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["sstock"]);
                $sold_for = $stock["price"] * $shares[0]["shares"];
                CS50::query("INSERT INTO history (user_num, transaction, datetime, symbol, shares, price) 
                VALUES (?, 'SELL', now(), ?, ?, ?)", $_SESSION["id"], strtoupper($_POST["sstock"]), $shares[0]["shares"], $stock["price"]);
                // updates users portfolio after deletion
                CS50::query("DELETE FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $stock["symbol"]);
                // updates users cash after sale
                CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $sold_for, $_SESSION["id"]);
                render("sold_stock.php", ["sold_for" => $sold_for]);
            }
            else if ($stock == false) {
                apologize("The symbol you've entered is not a valid stock option.");
            }
            else {
                apologize("What did you do?");
            }
        }
    }
?>