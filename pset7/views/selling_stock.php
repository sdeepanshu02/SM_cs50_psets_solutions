<table>
    <tr>
        <th>Symbol</th>
<!--        <th>Company Name</th>  -->
        <th>Shares</th>
<!--        <th>Price</th>    -->
    </tr>
<?php foreach ($users_stock as $stock): ?>

    <tr>
        <td><?= strtoupper($stock["symbol"]) ?></td>
<!--         <td> ?= $stock["name"] ?></td>    -->
        <td><?= $stock["shares"] ?></td>
<!--        <td>$ ?= number_format($position["price"], 2) ?></td>    -->
    </tr>
<?php endforeach ?>
</table>


<form action="sell.php" method="post">
    <h5>Which stock are you trying to sell?</h5>
    <input type="text" name="sstock" id="sstock" placeholder="Enter a symbol">
    <input type="submit" name="submit_sstock" id="submit_sstock">
</form>