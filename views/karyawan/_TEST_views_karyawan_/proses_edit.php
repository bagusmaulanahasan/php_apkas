<?php
    include_once "../../config/routes.php";
    include base_project() . "controllers/karyawanController.php";

    $karyawanController = new KaryawanController();
    $dataKaryawan = $karyawanController->getKaryawanByID($_GET['id']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Karyawan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <form method="post" action="<?= $karyawanController->update($_GET['id']) ?>" class="flex flex-col p-2 justify-center items-start gap-4">
        <label>Nama</label>
        <input required type="text" name="nama" placeholder="Nama" class="outline rounded-sm" value="<?= $dataKaryawan['nama_karyawan'] ?>">
        <label>Alamat</label>
        <input required type="text" name="alamat" placeholder="Alamat" class="outline rounded-sm" value="<?= $dataKaryawan['alamat'] ?>">
        <label>Jenis Kelamin</label>
        <select required name="jenis_kelamin">
            <option value="laki-laki" <?= $dataKaryawan['jenis_kelamin'] == 'laki-laki' ? 'selected' : '' ?> >Laki-laki</option>
            <option value="perempuan" <?= $dataKaryawan['jenis_kelamin'] == 'perempuan' ? 'selected' : '' ?> >Perempuan</option>
        </select>
        <label>Role</label>
        <input required type="text" name="role" placeholder="Role" class="outline rounded-sm" value="<?= $dataKaryawan['role'] ?>">
        <button type="submit" name="simpanEdit" class="bg-blue-700 text-white py-2 px-4 rounded-lg cursor-pointer">Simpan</button>
    </form>
</body>

</html>