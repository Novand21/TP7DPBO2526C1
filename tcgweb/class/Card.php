<?php
require_once 'config/db.php';

class Card {
    private $db;

    public function __construct($db_connection) {
        $this->db = $db_connection;
    }

    // adding cards
    public function addCard($expansion_id, $card_name, $price, $stock) {
        $stmt = $this->db->prepare("INSERT INTO cards (expansion_id, card_name, price, stock) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$expansion_id, $card_name, $price, $stock]);
    }

    // All cards with expansion names
    public function getAllCards() {
        $stmt = $this->db->prepare("SELECT cards.*, expansions.set_name FROM cards JOIN expansions ON cards.expansion_id = expansions.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Single card for editing
    public function getCardById($id) {
        $stmt = $this->db->prepare("SELECT * FROM cards WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // update existing card
    public function updateCard($id, $expansion_id, $card_name, $price, $stock) {
        $stmt = $this->db->prepare("UPDATE cards SET expansion_id = ?, card_name = ?, price = ?, stock = ? WHERE id = ?");
        return $stmt->execute([$expansion_id, $card_name, $price, $stock, $id]);
    }

    // delete cards
    public function deleteCard($id) {
        $stmt = $this->db->prepare("DELETE FROM cards WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>