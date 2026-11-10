
<?php
$current_card = $card->getCardById($_GET['id']);
?>

<h3>Edit Card</h3>
<form method="POST" action="?page=cards" class="fancy-form">
    <input type="hidden" name="id" value="<?= $current_card['id'] ?>">
    
    <label>Expansion Set:</label>
    <select name="expansion_id" required>
        <?php foreach ($expansion->getAllExpansions() as $e): ?>
            <option value="<?= $e['id'] ?>" <?= ($e['id'] == $current_card['expansion_id']) ? 'selected' : '' ?>>
                <?= $e['set_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <label>Card Name:</label>
    <input type="text" name="card_name" value="<?= $current_card['card_name'] ?>" required>
    
    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="<?= $current_card['price'] ?>" required>
    
    <label>Stock Quantity:</label>
    <input type="number" name="stock" value="<?= $current_card['stock'] ?>" required>
    
    <button type="submit" name="update_card">Update Card</button>
</form>