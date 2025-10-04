<?php
    include_once "../../config/routes.php";
    include __DIR__ . "/../../controllers/barangController.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new BarangController();
        $controller->update($_GET['id']);
        header('location: ' . base_url() . '/views/barang');
       exit;
    }
?>