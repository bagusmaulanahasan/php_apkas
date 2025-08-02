<?php

include "../../controllers/karyawanController.php";

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
</body>

</html>