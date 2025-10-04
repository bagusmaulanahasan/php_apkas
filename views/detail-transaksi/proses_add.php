<?php
    include_once "../../config/routes.php";
    include __DIR__ . "/../../controllers/detailTransaksiController.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new DetailTransaksiController();
        $controller->add($_POST['id_barang'], $_POST['id_transaksi'], $_POST['harga_barang'], $_POST['jumlah_barang']);
        header('location: ' . base_url() . '/views/detail_transaksi');
        exit;
    }
?>
