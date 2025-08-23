<?php
// include "../../config/routes.php";
// include base_project() . "/models/karyawan.php";
include __DIR__ . "/../models/karyawan.php";

class KaryawanController
{
    public function getAllKaryawan()
    {
        $model = new Karyawan();
        $dataKaryawan = $model->getAllKaryawan();
        $output = '';

        foreach ($dataKaryawan as $row) {
            $output .= "
                <tr>
                    <td>{$row['nama_karyawan']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['jenis_kelamin']}</td>
                    <td>{$row['role']}</td>
                </tr>
            ";
        }
        return $output;
    }

    // NEW CODE
    public function add($nama, $alamat, $jenis_kelamin, $role) {
        $model = new Karyawan();
        return $model->addKaryawan($nama, $alamat, $jenis_kelamin, $role);
    }

//     public function add($nama, $alamat, $jenis_kelamin, $role) {
//     $database = new Database();
//     $stmt = $database->conn->prepare("INSERT INTO karyawan (nama_karyawan, alamat, jenis_kelamin, role) VALUES (?, ?, ?, ?)");
//     if(!$stmt){
//         die("Prepare failed: " . $database->conn->error);
//     }
//     $stmt->bind_param("ssss", $nama, $alamat, $jenis_kelamin, $role);
//     if(!$stmt->execute()){
//         die("Execute failed: " . $stmt->error);
//     }
//     return true;
// }



    public function update($id, $nama, $alamat, $jenis_kelamin, $role) {
        $model = new Karyawan();
        return $model->updateKaryawan($id, $nama, $alamat, $jenis_kelamin, $role);
    }

    public function delete($id) {
        $model = new Karyawan();
        return $model->deleteKaryawan($id);
    }
}
?>
