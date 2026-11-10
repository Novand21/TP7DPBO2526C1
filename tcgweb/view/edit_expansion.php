
<?php
$current_expansion = $expansion->getExpansionById($_GET['id']);
?>

<h3>Edit Expansion</h3>
<form method="POST" action="?page=expansions" class="fancy-form">
    <input type="hidden" name="id" value="<?= $current_expansion['id'] ?>">
    
    <label>Set Name:</label>
    <input type="text" name="set_name" value="<?= $current_expansion['set_name'] ?>" required>
    
    <label>Release Year:</label>
    <input type="number" name="release_year" value="<?= $current_expansion['release_year'] ?>" required>
    
    <button type="submit" name="update_expansion">Update Expansion</button>
</form>