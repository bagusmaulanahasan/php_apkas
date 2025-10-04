<?php
    include_once "../../config/routes.php";
    include __DIR__ . "/../../controllers/transaksiController.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $transaksiController = new TransaksiController();
        $transaksiController->add($_POST['nama_pembeli'], $_POST['total_belanja'], $_POST['id_karyawan']);
        header('location: ' . base_url() . '/views/transaksi');
        exit;
    }
?>
