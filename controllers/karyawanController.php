<?php

// include "../../config/routes.php";
include base_project()."/models/karyawan.php";

class KaryawanController
{
    public function getAllKaryawan()
    {
        $karyawan = new Karyawan();
        $dataKaryawan = $karyawan->getAllKaryawan();
        $bebas = '';
        foreach ($dataKaryawan as $karyawan) {
            $bebas += "
                <tr>
                    <td>' . $karyawan->nama_karyawan . '</td>
                    <td>' . $karyawan->alamat . '</td>
                    <td>' . $karyawan->jenis_kelamin . '</td>
                    <td>' . $karyawan->role . '</td>
                </tr>
                ";
        }
        return $bebas;
    }
}

?>