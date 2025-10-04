 <?php
include_once "../../config/routes.php";
include base_project() . "/models/transaksi.php";

class TransaksiController
{
    private $model;

    public function __construct()
    {
        $this->model = new Transaksi();

    }

    public function getAllTransaksi()
    {
        $dataTransaksi = $this->model->getAllTransaksi();
        return $dataTransaksi;
    }

    public function gettransaksiByID($id)
    {
        $dataTransaksi = $this->model->getTransaksiByID($id);
        return $dataTransaksi;
    }

    // NEW CODE
    public function add($nama_pembeli, $total_belanja, $id_karyawan)
    {
        return $this->model->addTransaksi($nama_pembeli, $total_belanja, $id_karyawan);
    }

    public function update($id)
    {
        $nama_pembeli = $_POST['nama_pembeli'];
        $total_belanja = $_POST['total_belanja'];
        $id_karyawan = $_POST['id_karyawan'];
        $this->model->updateTransaksi($id, $nama_pembeli, $total_belanja, $id_karyawan);
    }

    public function delete($id)
    {
        if ($id) {
            $this->model->deleteTransaksi($id);
        }
    }

}
?>