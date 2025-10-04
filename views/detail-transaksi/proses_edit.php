<?php
    include_once "../../config/routes.php";
    include __DIR__ . "/../../controllers/detailTransaksiController.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new DetailTransaksiController();
        $controller->update($_GET['id']);
        header('location: ' . base_url() . '/views/detail_transaksi');
       exit;
    }
?>