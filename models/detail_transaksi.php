<?php
include __DIR__ . "/../config/database.php";
class DetailTransaksi {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getAllDetailTransaksi()
    {
        $query = 'SELECT dt.id, dt.id_barang, dt.id_transaksi, dt.harga_barang, dt.jumlah_barang, b.nama_barang FROM detail_transaksi dt INNER JOIN barang b ON dt.id_barang = b.id';
        $result = $this->database->conn->query($query);        

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getDetailTransaksiByID($id) {
        $query = "SELECT * FROM detail_transaksi WHERE id = $id";
        $result = $this->database->conn->query($query);        
        return $result->fetch_assoc();
    }

    // NEW CODE
    public function addDetailTransaksi($id_barang, $id_transaksi, $harga_barang, $jumlah_barang) {
        $stmt = $this->database->conn->prepare("INSERT INTO detail_transaksi (id_barang_karyawan, id_transaksi, harga_barang, jumlah_barang) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $id_barang, $id_transaksi, $harga_barang, $jumlah_barang);
        return $stmt->execute();
    }

    public function updateDetailTransaksi($id, $nama, $alamat, $harga_barang, $jumlah_barang) {
        $stmt = $this->database->conn->prepare("UPDATE detail_transaksi SET nama_karyawan=?, alamat=?, harga_barang=?, jumlah_barang=? WHERE id=?");
        $stmt->bind_param("ssssi", $nama, $alamat, $harga_barang, $jumlah_barang, $id);
        return $stmt->execute();
    }

    public function deleteDetailTransaksi($id) {
        $stmt = $this->database->conn->prepare("DELETE FROM detail_transaksi WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>