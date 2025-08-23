<?php
include __DIR__ . "/../../controllers/karyawanController.php";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $controller = new KaryawanController();
//     $controller->add($_POST['nama'], $_POST['alamat'], $_POST['jenis_kelamin'], $_POST['role']);
//     header("Location: index.php"); 
//     exit;
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new KaryawanController();
    if ($controller->add($_POST['nama'], $_POST['alamat'], $_POST['jenis_kelamin'], $_POST['role'])) {
        echo "Berhasil menambah data!";
    } else {
        echo "Gagal menambah data!";
    }
    // header("Location: index.php"); 
    exit;
}
?>
