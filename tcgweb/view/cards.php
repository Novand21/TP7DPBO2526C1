
<h3>Card Inventory</h3>

<table class="fancy-table">
    <tr>
        <th>ID</th>
        <th>Expansion Set</th>
        <th>Card Name</th>
        <th>Price ($)</th>
        <th>Stock</th>
        <th>Action</th> 
    </tr>
    <?php foreach ($card->getAllCards() as $c): ?>
    <tr>
        <td><?= $c['id'] ?></td>
        <td><?= $c['set_name'] ?></td>
        <td><?= $c['card_name'] ?></td>
        <td><?= number_format($c['price'], 2) ?></td>
        <td><?= $c['stock'] ?></td>
        <td>
            
            <a href="?page=cards&delete_card=<?= $c['id'] ?>" style="color: red;" onclick="return confirm('Are you sure?')">Delete</a>
            | 
            
            <a href="?page=edit_card&id=<?= $c['id'] ?>" style="color: orange;">Edit</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<hr style="margin: 30px 0;">

<h3>Add New Card</h3>
<form method="POST" class="fancy-form">
    <label>Expansion Set:</label>
    <select name="expansion_id" required>
        <?php foreach ($expansion->getAllExpansions() as $e): ?>
            <option value="<?= $e['id'] ?>"><?= $e['set_name'] ?></option>
        <?php endforeach; ?>
    </select>
    
    <label>Card Name:</label>
    <input type="text" name="card_name" placeholder="e.g., Charizard Holo" required>
    
    <label>Price:</label>
    <input type="number" step="0.01" name="price" placeholder="0.00" required>
    
    <label>Stock Quantity:</label>
    <input type="number" name="stock" placeholder="0" required>
    
    <button type="submit" name="add_card">Save Card</button>
</form>