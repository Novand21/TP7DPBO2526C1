<?php
// index.php

require_once 'config/db.php';
require_once 'class/Expansion.php';
require_once 'class/Card.php';
require_once 'class/Order.php';


$database = new Database();
$db = $database->conn;

// Instantiate classes
$expansion = new Expansion($db);
$card = new Card($db);
$order = new Order($db);

// Handle global actions before HTML renders 
if (isset($_POST['add_expansion'])) {
    $expansion->addExpansion($_POST['set_name'], $_POST['release_year']);
}

if (isset($_POST['add_order'])) {
    $order->addOrder($_POST['card_id'], $_POST['buyer_name'], $_POST['quantity']);
}

if (isset($_POST['add_card'])) {
    $card->addCard($_POST['expansion_id'], $_POST['card_name'], $_POST['price'], $_POST['stock']);
}

if (isset($_POST['update_card'])) {
    $card->updateCard($_POST['id'], $_POST['expansion_id'], $_POST['card_name'], $_POST['price'], $_POST['stock']);
}

if (isset($_POST['update_expansion'])) {
    $expansion->updateExpansion($_POST['id'], $_POST['set_name'], $_POST['release_year']);
}

if (isset($_GET['delete_order'])) {
    $order->deleteOrder($_GET['delete_order']);
}
if (isset($_GET['delete_card'])) {
    $card->deleteCard($_GET['delete_card']);
}
if (isset($_GET['delete_expansion'])) {
    $expansion->deleteExpansion($_GET['delete_expansion']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TCG Store System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    
    <main>
        <h2>Welcome to the TCG Store System</h2>
        <nav>
            <a href="?page=expansions">Expansions</a> |
            <a href="?page=cards">Cards</a> |
            <a href="?page=orders">Orders</a>
        </nav>

        <hr>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'expansions') {
                include 'view/expansions.php';
            } elseif ($page == 'cards') {
                include 'view/cards.php';
            } elseif ($page == 'orders') {
                include 'view/orders.php';
            }
            elseif ($page == 'edit_card') {    
                include 'view/edit_card.php';    
            }
            elseif ($page == 'edit_expansion') {    
                include 'view/edit_expansion.php';    
            }
        } else {
            // Default page when no parameter is present
            include 'view/cards.php'; 
        }
        ?>
    </main>

    <?php include 'view/footer.php'; ?>
</body>
</html>