<table>
    <tr>
        <th>Symbol</th>
        <th>Company Name</th>
        <th>Shares</th>
        <th>Price</th>
    </tr>
<?php foreach ($positions as $position): ?>

    <tr>
        <td><?= strtoupper($position["symbol"]) ?></td>
        <td><?= $position["name"] ?></td>
        <td><?= $position["shares"] ?></td>
        <td>$<?= number_format($position["price"], 2) ?></td>
    </tr>
<?php endforeach ?>
</table>

<h5>Cash = $<?= number_format($hard_earned[0]["cash"], 2) ?></h5>

<form action="index.php" method="post">
    <p>Would you like to add funds?</p>
    <input type="text" name="add" id="add" placeholder="Enter Amount">
    <input type="submit" name="submit" id="submit">
</form>