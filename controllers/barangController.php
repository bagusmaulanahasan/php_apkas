<?php
include_once "../../config/routes.php";
include base_project() . "/models/barang.php";

class BarangController
{
    private $model;

    public function __construct()
    {
        $this->model = new Barang();

    }

    public function getAllBarang()
    {
        $dataBarang = $this->model->getAllBarang();
        return $dataBarang;
    }

    public function getBarangByID($id)
    {
        $dataBarang = $this->model->getBarangByID($id);
        return $dataBarang;
    }

    // NEW CODE
    public function add($nama_barang, $harga)
    {
        return $this->model->addBarang($nama_barang, $harga);
    }

    public function update($id)
    {
            $nama_barang = $_POST['nama_barang'];
            $harga = $_POST['harga'];
            $this->model->updateBarang($id, $nama_barang, $harga);
    }

    public function delete($id)
    {
        if ($id) {
            $this->model->deleteBarang($id);
        }
    }

}
?>