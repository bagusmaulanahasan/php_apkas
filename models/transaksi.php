<?php
include __DIR__ . "/../config/database.php";
class transaksi {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getAllTransaksi()
    {
        $query = 'SELECT t.id, t.nama_pembeli, t.total_belanja, t.id_karyawan, k.nama_karyawan FROM transaksi t INNER JOIN karyawan k ON t.id_karyawan = k.id';
        $result = $this->database->conn->query($query);        

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getTransaksiByID($id) {
        $query = "SELECT * FROM transaksi WHERE id = $id";
        $result = $this->database->conn->query($query);        
        return $result->fetch_assoc();
    }

    // NEW CODE
    public function addTransaksi($nama_pembeli, $total_belanja, $id_karyawan) {
        $stmt = $this->database->conn->prepare("INSERT INTO transaksi (nama_pembeli, total_belanja,id_karyawan) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $nama_pembeli, $total_belanja, $id_karyawan);
        return $stmt->execute();
    }

    public function updateTransaksi($id, $nama_pembeli, $total_belanja, $id_karyawan) {
        $stmt = $this->database->conn->prepare("UPDATE transaksi SET nama_pembeli=?, total_belanja=?, id_karyawan=? WHERE id=?");
        $stmt->bind_param("siii", $nama_pembeli, $total_belanja, $id_karyawan, $id);
        return $stmt->execute();
    }

    public function deleteTransaksi($id) {
        $stmt = $this->database->conn->prepare("DELETE FROM transaksi WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>