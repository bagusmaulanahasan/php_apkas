<?php
    include_once "../../config/routes.php";
    include __DIR__ . "/../../controllers/karyawanController.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new KaryawanController();
        $controller->update($_GET['id']);
        header('location: ' . base_url() . '/views/karyawan');
       exit;
    }
?>