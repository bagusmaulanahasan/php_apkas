<?php
    include_once "../../config/routes.php";
    include __DIR__ . "/../../controllers/karyawanController.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && isset($_POST['hapus'])) {
        $controller = new KaryawanController();
        $controller->delete($_GET['id']);
        header('Location: ' . base_url() . '/views/karyawan');
        exit;
}
