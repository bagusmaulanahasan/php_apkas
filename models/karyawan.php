<?php
include __DIR__ . "/../config/database.php";
class Karyawan {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getAllKaryawan()
    {
        $query = 'SELECT * FROM karyawan';
        $result = $this->database->conn->query($query);        

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
        
        // echo json_encode($data);
        // print_r($data['nama_karyawan']);
    }

    public function getKaryawanByID($id) {
        $query = "SELECT * FROM karyawan WHERE id = $id";
        $result = $this->database->conn->query($query);        
        return $result->fetch_assoc();
    }

    // NEW CODE
    public function addKaryawan($nama, $alamat, $jenis_kelamin, $role) {
        $stmt = $this->database->conn->prepare("INSERT INTO karyawan (nama_karyawan, alamat, jenis_kelamin, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $alamat, $jenis_kelamin, $role);
        return $stmt->execute();
    }

    public function updateKaryawan($id, $nama, $alamat, $jenis_kelamin, $role) {
        $stmt = $this->database->conn->prepare("UPDATE karyawan SET nama_karyawan=?, alamat=?, jenis_kelamin=?, role=? WHERE id=?");
        $stmt->bind_param("ssssi", $nama, $alamat, $jenis_kelamin, $role, $id);
        return $stmt->execute();
    }

    public function deleteKaryawan($id) {
        $stmt = $this->database->conn->prepare("DELETE FROM karyawan WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

// $karyawan = new Karyawan();
// $karyawan->getAllKaryawan();
?>