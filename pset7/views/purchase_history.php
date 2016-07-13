<table>
    <tr>
        <th>Transaction</th>
        <th>Date/Time</th>
        <th>Symbol</th>
        <th>Shares</th>
        <th>Price</th>
    </tr>
<?php foreach ($histories as $history): ?>

    <tr>
        <td><?= strtoupper($history["transaction"]) ?></td>
        <td><?= $history["datetime"] ?></td>
        <td><?= strtoupper($history["symbol"]) ?></td>
        <td><?= $history["shares"]?></td>
        <td>$<?= number_format($history["price"], 2) ?></td>
    </tr>
<?php endforeach ?>
</table>