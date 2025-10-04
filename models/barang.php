<?php
include __DIR__ . "/../config/database.php";
class barang {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getAllBarang()
    {
        $query = 'SELECT * FROM barang';
        $result = $this->database->conn->query($query);        

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getBarangByID($id) {
        $query = "SELECT * FROM barang WHERE id = $id";
        $result = $this->database->conn->query($query);        
        return $result->fetch_assoc();
    }

    // NEW CODE
    public function addBarang($nama_barang, $harga) {
        $stmt = $this->database->conn->prepare("INSERT INTO barang (nama_barang, harga) VALUES (?, ?)");
        $stmt->bind_param("si", $nama_barang, $harga);
        return $stmt->execute();
    }

    public function updateBarang($id, $nama_barang, $harga) {
        $stmt = $this->database->conn->prepare("UPDATE barang SET nama_barang=?, harga=? WHERE id=?");
        $stmt->bind_param("sii", $nama_barang, $harga, $id);
        return $stmt->execute();
    }

    public function deleteBarang($id) {
        $stmt = $this->database->conn->prepare("DELETE FROM barang WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>