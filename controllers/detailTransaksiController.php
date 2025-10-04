<?php
include_once "../../config/routes.php";
include base_project() . "/models/detail_transaksi.php";

class DetailTransaksiController
{
    private $model;

    public function __construct()
    {
        $this->model = new DetailTransaksi();

    }

    public function getAllDetailTransaksi()
    {
        $dataKaryawan = $this->model->getAllDetailTransaksi();
        return $dataKaryawan;
    }

    public function getDetailTransaksiByID($id)
    {
        $dataKaryawan = $this->model->getDetailTransaksiByID($id);
        return $dataKaryawan;
    }

    // NEW CODE
    public function add($id_barang, $id_transaksi, $harga_barang, $jumlah_barang)
    {
        return $this->model->addDetailTransaksi($id_barang, $id_transaksi, $harga_barang, $jumlah_barang);
    }

    public function update($id)
    {
            $id_barang = $_POST['id_barang'];
            $id_transaksi = $_POST['id_transaksi'];
            $harga_barang = $_POST['harga_barang'];
            $jumlah_barang = $_POST['jumlah_barang'];
            $this->model->updateDetailTransaksi($id, $id_barang, $id_transaksi, $harga_barang, $jumlah_barang);
    }

    public function delete($id)
    {
        if ($id) {
            $this->model->deleteDetailTransaksi($id);
        }
    }

}
?>