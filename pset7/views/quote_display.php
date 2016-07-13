<table>
    <tr>
        <th>Symbol</th>
        <th>Company Name</th>
        <th>Price</th>
    </tr>
    <tr>
        <td><?= strtoupper($stock["symbol"]) ?></td>
        <td><?= $stock["name"] ?></td>
        <td>$<?= number_format($stock["price"], 2) ?></td>
    </tr>
</table>