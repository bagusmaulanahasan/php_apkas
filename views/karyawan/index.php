<?php

include "../../config/routes.php";
include base_project()."controllers/karyawanController.php";
// include __DIR__ . "/../../controllers/karyawanController.php";

$karyawanController = new KaryawanController();
$dataKaryawan = $karyawanController->getAllKaryawan();

$mode = isset($_GET['edit']) ? 'edit' : 'add';
$data = $mode === 'edit' ? $karyawanController->getKaryawanById($_GET['edit']) : null;
$action = $mode === 'edit' ? "proses_edit.php?id=" . $_GET['edit'] : "proses_add.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="px-8">
    <?php include "../layouts/navbar.php" ?>
    <button id="tambahKaryawan" class="px-4 py-2 rounded-lg text-white bg-blue-600 hover:bg-blue-700 cursor-pointer mt-6 ms-2">Tambah Karyawan</button>
    <table border="1" cellspacing="0" class="border w-2/3 w-full mx-auto">
        <caption class="text-lg font-semibold mb-2">Daftar Karyawan</caption>
        <thead>
            <tr class="bg-blue-200 text-slate-800">
                <th class="py-3 ps-2 text-start">Nama Karyawan</th>
                <th class="py-3 text-start">Alamat</th>
                <th class="py-3 text-start">Jenis Kelamin</th>
                <th class="py-3 text-start">Role</th>
                <th class="py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($dataKaryawan as $row) : ?>
                    <tr class="even:bg-gray-100 text-slate-800">
                        <td class="py-3 ps-2"><?=$row['nama_karyawan']?></td>
                        <td class="py-3"><?=$row['alamat']?></td>
                        <td class="py-3"><?=$row['jenis_kelamin']?></td>
                        <td class="py-3"><?=$row['role']?></td>
                        <td class="flex justify-center gap-4 items-center py-2">
                            <a href="index.php?edit=<?= $row['id'] ?>" class="text-green-700 bg-green-200 py-1 px-4 rounded-lg">Edit</a>
                            <form method="post" action="proses_delete.php?id=<?= $row['id'] ?>"><button type="submit" name="hapus" class="text-red-700 bg-red-200 py-1 px-4 rounded-lg cursor-pointer" onsubmit="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <section id="form" class="fixed backdrop-blur bg-black/30 inset-0 h-screen hidden items-center justify-center transition-all duration-300">
        <form method="post" action="<?= $action ?>" class="bg-white p-4 rounded-lg w-1/3">
            <fieldset class="border border-solid flex flex-col p-4 justify-center items-start gap-6 rounded-xl <?= $mode === 'edit' ? 'border-green-600' : 'border-blue-600' ?>">
                <legend class="text-lg font-semibold text-center underline underline-offset-4 mb-2 px-2 <?= $mode === 'edit' ? 'text-green-700' : 'text-blue-700' ?>">
                     <?= $mode === 'edit' ? 'Form Edit Karyawan' : 'Form Tambah Karyawan' ?>
                </legend>
                <div class="flex w-full">
                    <label class="w-48">Nama</label>
                    <input required type="text" name="nama" class="border border-gray-300 text-slate-600 rounded-sm w-full py-1 px-2 focus:border-gray-600 focus:outline-0" value="<?= $data['nama_karyawan'] ?? '' ?>">
                </div>
                <div class="flex w-full">
                    <label class="w-48">Alamat</label>
                    <input required type="text" name="alamat" class="border border-gray-300 text-slate-600 rounded-sm w-full py-1 px-2 focus:border-gray-600 focus:outline-0" value="<?= $data['alamat'] ?? '' ?>">
                </div>
                <div class="flex w-full">
                    <label class="w-48">Jenis Kelamin</label>
                    <select required name="jenis_kelamin" class="border border-gray-300 text-slate-600 rounded-sm w-full cursor-pointer py-1 px-2 focus:border-gray-600 focus:outline-0"> 
                        <option value="" disabled selected hidden <?= $data ? '' : 'selected' ?> >--pilih gender--</option>
                        <option value="laki-laki" class="hover:bg-blue-300" <?= $data && $data['jenis_kelamin'] === 'laki-laki' ? 'selected' : '' ?> >Laki-laki</option>
                        <option value="perempuan" <?= $data && $data['jenis_kelamin'] === 'perempuan' ? 'selected' : '' ?> >Perempuan</option>
                    </select>
                </div>
                <div class="flex w-full">
                    <label class="w-48">Role</label>
                    <select required name="role" class="border border-gray-300 text-slate-600 rounded-sm w-full cursor-pointer py-1 px-2 focus:border-gray-600 focus:outline-0">
                        <option value="" disabled selected hidden  <?= $data ? '' : 'selected' ?> >--pilih role--</option>
                        <option value="kasir" <?= $data && $data['role'] === 'kasir' ? 'selected' : '' ?> >Kasir</option>
                        <option value="inventor" <?= $data && $data['role'] === 'inventor' ? 'selected' : '' ?> >Inventor</option>
                    </select>
                </div>
                <div class="flex flex-col w-full gap-2 my-2">
                    <button type="submit" class="text-white py-2 px-4 rounded-lg cursor-pointer w-full <?= $mode === 'edit' ? 'bg-green-600 hover:bg-green-700' : 'bg-blue-600 hover:bg-blue-700' ?>">
                        <?= $mode === 'edit' ? 'Simpan Perubahan' : 'Tambah' ?>
                    </button>
                    <button type="reset" id="batalTambah" class="bg-gray-500 text-white py-2 px-4 rounded-lg cursor-pointer hover:bg-gray-600 w-full">Batal</button>
                </div>
            </fieldset>
        </form>
    </section>
    <?php if ($mode === 'edit') : ?>
        <script>
          document.addEventListener('DOMContentLoaded', () => {
            form.classList.remove('hidden');
            form.classList.add('flex');
          });
        </script>
    <?php endif; ?>

    <script>
        const form = document.querySelector("#form");
        const btnTambahKaryawan = document.querySelector("#tambahKaryawan");
        const btnCancel = document.querySelector("#batalTambah");

        btnTambahKaryawan.addEventListener('click', (e) => {
            e.preventDefault();
            form.classList.remove('hidden');
            form.classList.add('flex');
        })

        btnCancel.addEventListener('click', (e) => {
            e.preventDefault();
            form.classList.remove('flex');
            form.classList.add('hidden');
            window.location.href = "index.php";
        })
    </script>
</body>

</html>
