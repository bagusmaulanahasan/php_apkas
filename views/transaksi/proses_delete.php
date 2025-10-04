<?php
    include_once "../../config/routes.php";
    include __DIR__ . "/../../controllers/transaksiController.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && isset($_POST['hapus'])) {
        $controller = new TransaksiController();
        $controller->delete($_GET['id']);
        header('Location: ' . base_url() . '/views/transaksi');
        exit;
}
