<?php
require_once 'config/db.php';

class Order {
    private $db;

    public function __construct($db_connection) {
        $this->db = $db_connection;
    }

    // add the card to order
    public function addOrder($card_id, $buyer_name, $quantity) {
        $stmt = $this->db->prepare("INSERT INTO orders (card_id, buyer_name, quantity, order_date) VALUES (?, ?, ?, CURDATE())");
        return $stmt->execute([$card_id, $buyer_name, $quantity]);
    }

    // get all the orders
    public function getAllOrders() {
        $stmt = $this->db->prepare("SELECT orders.*, cards.card_name FROM orders JOIN cards ON orders.card_id = cards.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById($id) {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // update existing order
    public function updateOrder($id, $card_id, $buyer_name, $quantity) {
        $stmt = $this->db->prepare("UPDATE orders SET card_id = ?, buyer_name = ?, quantity = ? WHERE id = ?");
        return $stmt->execute([$card_id, $buyer_name, $quantity, $id]);
    }

    // delete the order
    public function deleteOrder($id) {
        $stmt = $this->db->prepare("DELETE FROM orders WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>