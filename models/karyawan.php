<?php
include __DIR__ . "/../config/database.php";
class Karyawan
{
    public function getAllKaryawan()
    {
        $database = new Database();
        $query = 'SELECT * FROM karyawan';
        $result = $database->conn->query($query);        

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
        
        // echo json_encode($data);
        // print_r($data['nama_karyawan']);
    }

    // NEW CODE
    public function addKaryawan($nama, $alamat, $jenis_kelamin, $role) {
        $database = new Database();
        $stmt = $database->conn->prepare("INSERT INTO karyawan (nama_karyawan, alamat, jenis_kelamin, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $alamat, $jenis_kelamin, $role);
        return $stmt->execute();
    }

    public function updateKaryawan($id, $nama, $alamat, $jenis_kelamin, $role) {
        $database = new Database();
        $stmt = $database->conn->prepare("UPDATE karyawan SET nama_karyawan=?, alamat=?, jenis_kelamin=?, role=? WHERE id=?");
        $stmt->bind_param("ssssi", $nama, $alamat, $jenis_kelamin, $role, $id);
        return $stmt->execute();
    }

    public function deleteKaryawan($id) {
        $database = new Database();
        $stmt = $database->conn->prepare("DELETE FROM karyawan WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

// $karyawan = new Karyawan();
// $karyawan->getAllKaryawan();
?>