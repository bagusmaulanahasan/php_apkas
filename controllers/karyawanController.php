<?php
include_once "../../config/routes.php";
include base_project() . "/models/karyawan.php";
// include __DIR__ . "/../models/karyawan.php";

class KaryawanController
{
    private $model;

    public function __construct()
    {
        $this->model = new Karyawan();

    }

    public function getAllKaryawan()
    {
        $dataKaryawan = $this->model->getAllKaryawan();
        return $dataKaryawan;
    }

    public function getKaryawanByID($id)
    {
        $dataKaryawan = $this->model->getKaryawanByID($id);
        return $dataKaryawan;
    }

    // NEW CODE
    public function add($nama, $alamat, $jenis_kelamin, $role)
    {
        return $this->model->addKaryawan($nama, $alamat, $jenis_kelamin, $role);
    }

    public function update($id)
    {
        // if (isset($_POST['simpanEdit'])) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $role = $_POST['role'];
            $this->model->updateKaryawan($id, $nama, $alamat, $jenis_kelamin, $role);
            // header("location: " . base_url() . '/views/karyawan/index.php');
            // exit;
        // }
    }

    public function delete($id)
    {
        if ($id) {
            $this->model->deleteKaryawan($id);
        }
    }

}
?>