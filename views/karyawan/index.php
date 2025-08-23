<?php

// include "../../config/routes.php";
include __DIR__ . "/../../controllers/karyawanController.php";

$karyawanController = new KaryawanController();
$dataKaryawan = $karyawanController->getAllKaryawan();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan</title>
</head>

<body>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?= $dataKaryawan ?>
        </tbody>
    </table>

    <form method="post" action="proses_add.php">
        <input type="text" name="nama" placeholder="Nama">
        <input type="text" name="alamat" placeholder="Alamat">
        <select name="jenis_kelamin">
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
        <input type="text" name="role" placeholder="Role">
        <button type="submit">Tambah</button>
    </form>

</body>

</html>
