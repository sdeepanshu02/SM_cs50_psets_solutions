<?php
    
    require("../includes/config.php");
    $rows = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        render("buy_stock.php", ["title" => "buy"]);
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stock = lookup($_POST["stock"]);
        if (preg_match("/^\d+$/", $_POST["shares"] != true)) {
            apologize("Invalid number.");
        }
        else if ($rows[0]["cash"] < ($stock["price"] * $_POST["shares"])) {
            apologize("You don't have enough cash you loser.");
        }
        else if ($stock == false) {
            apologize("What do you think you're trying to pull.");
        }
        else {
            CS50::query("INSERT INTO history (user_num, transaction, datetime, symbol, shares, price) 
                VALUES (?, 'BUY', now(), ?, ?, ?)", $_SESSION["id"], strtoupper($_POST["stock"]), $_POST["shares"], $stock["price"]);
            CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", ($stock["price"] * $_POST["shares"]), $_SESSION["id"]);
            CS50::query("INSERT INTO portfolios (user_id, symbol, shares) VALUES(?, ?, ?) 
                         ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], strtoupper($_POST["stock"]), $_POST["shares"]);
            render("bought_stock.php", ["title" => "bought", "stock" => $stock, "shares" => $_POST["shares"]]);
        }
    }
    
?>