
<h3>Purchase History</h3>

<table class="fancy-table">
    <tr>
        <th>Order ID</th>
        <th>Card Purchased</th>
        <th>Buyer Name</th>
        <th>Quantity</th>
        <th>Order Date</th>
    </tr>
    <?php foreach ($order->getAllOrders() as $o): ?>
    <tr>
        <td><?= $o['id'] ?></td>
        <td><?= $o['card_name'] ?></td>
        <td><?= $o['buyer_name'] ?></td>
        <td><?= $o['quantity'] ?></td>
        <td><?= $o['order_date'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<hr style="margin: 30px 0;">

<h3>Process New Purchase</h3>
<form method="POST" class="fancy-form">
    <label>Select Card:</label>
    <select name="card_id" required>
        <?php foreach ($card->getAllCards() as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['card_name'] ?> ($<?= $c['price'] ?>)</option>
        <?php endforeach; ?>
    </select>
    
    <label>Buyer Name:</label>
    <input type="text" name="buyer_name" placeholder="Enter customer name" required>
    
    <label>Quantity:</label>
    <input type="number" name="quantity" placeholder="1" required>
    
    <button type="submit" name="add_order">Submit Order</button>
</form>