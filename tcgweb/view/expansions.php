<h3>Expansion Sets</h3>
<table class="fancy-table">
    <tr>
        <th>ID</th>
        <th>Set Name</th>
        <th>Release Year</th>
        <th>Action</th> 
    </tr>
    <?php foreach ($expansion->getAllExpansions() as $e): ?>
    <tr>
        <td><?= $e['id'] ?></td>
        <td><?= $e['set_name'] ?></td>
        <td><?= $e['release_year'] ?></td>
        <td>
            <a href="?page=expansions&delete_expansion=<?= $e['id'] ?>" style="color: red;" onclick="return confirm('Are you sure? Deleting this will also delete all cards inside this expansion!')">Delete</a>
            |
            <a href="?page=edit_expansion&id=<?= $e['id'] ?>" style="color: orange;">Edit</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<hr style="margin: 30px 0;">


<hr style="margin: 30px 0;">

<h3>Add New Expansion</h3>
<form method="POST" class="fancy-form">
    <label>Set Name:</label>
    <input type="text" name="set_name" placeholder="e.g., Paldea Evolved" required>
    
    <label>Release Year:</label>
    <input type="number" name="release_year" placeholder="2023" required>
    
    <button type="submit" name="add_expansion">Save Expansion</button>
</form>