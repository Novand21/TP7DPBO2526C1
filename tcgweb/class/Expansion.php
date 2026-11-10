<?php
require_once 'config/db.php';

class Expansion {
    private $db;

    public function __construct($db_connection) {
        $this->db = $db_connection;
    }

    // add card expansion
    public function addExpansion($set_name, $release_year) {
        $stmt = $this->db->prepare("INSERT INTO expansions (set_name, release_year) VALUES (?, ?)");
        return $stmt->execute([$set_name, $release_year]);
    }

    // catch em all
    public function getAllExpansions() {
        $stmt = $this->db->prepare("SELECT * FROM expansions");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExpansionById($id) {
        $stmt = $this->db->prepare("SELECT * FROM expansions WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // update existing expansion
    public function updateExpansion($id, $set_name, $release_year) {
        $stmt = $this->db->prepare("UPDATE expansions SET set_name = ?, release_year = ? WHERE id = ?");
        return $stmt->execute([$set_name, $release_year, $id]);
    }

    // delete expansion
    public function deleteExpansion($id) {
        $stmt = $this->db->prepare("DELETE FROM expansions WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>