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
}
?>
