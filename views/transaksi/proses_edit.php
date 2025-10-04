<?php
    include_once "../../config/routes.php";
    include __DIR__ . "/../../controllers/transaksiController.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new TransaksiController();
        $controller->update($_GET['id']);
        header('location: ' . base_url() . '/views/transaksi');
       exit;
    }
?>