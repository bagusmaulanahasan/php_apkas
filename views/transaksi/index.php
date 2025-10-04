<?php
	include "../../config/routes.php";
	include base_project()."controllers/transaksiController.php";

	$transaksiController = new TransaksiController();
	$dataTransaksi = $transaksiController->getAllTransaksi();


	$mode = isset($_GET['edit']) ? 'edit' : 'add';
	$data = $mode === 'edit' ? $transaksiController->getTransaksiById($_GET['edit']) : null;
	$action = $mode === 'edit' ? "proses_edit.php?id=" . $_GET['edit'] : "proses_add.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transaksi</title>
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="px-8 ">
    <?php include "../layouts/navbar.php" ?>
	<button id="tambahTransaksi" class="px-4 py-2 rounded-lg text-white bg-blue-600 hover:bg-blue-700 cursor-pointer mt-6 ms-2">Tambah Transaksi</button>
    <table border="1" cellspacing="0" class="border w-2/3 mx-auto">
        <caption class="text-lg font-semibold mb-2">Daftar Transaksi</caption>
        <thead>
			<tr class="bg-blue-200 text-slate-800">
                <th class="py-3 ps-2 text-start">Nama Pembeli</th>
                <th class="py-3 ps-2 text-start">Total Belanja</th>
                <th class="py-3 ps-2 text-start">Nama Karyawan</th>
                <th class="py-3 ps-2 text-center w-80">Aksi</th>
             </tr>
		</thead>
		<tbody>
            <?php 
                foreach ($dataTransaksi as $row) : ?>
                    <tr class="even:bg-gray-100 text-slate-800">
                        <td class="py-3 ps-2"><?=$row['nama_pembeli']?></td>
                        <td class="py-3"><?=$row['total_belanja']?></td>
                        <td class="py-3"><?=$row['nama_karyawan']?></td>
                        <td class="flex justify-center gap-4 items-center py-2">
                            <a href="index.php?detail<?= $row['id'] ?>" class="py-1 px-4 bg-blue-500 text-white cursor-pointer rounded-lg">Lihat Detail</a>
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
                     <?= $mode === 'edit' ? 'Form Edit Transaksi' : 'Form Tambah Transaksi' ?>
                </legend>
                <div class="flex w-full">
                    <label class="w-48">Nama Pembeli</label>
                    <input required type="text" name="nama_pembeli" class="border border-gray-300 text-slate-600 rounded-sm w-full py-1 px-2 focus:border-gray-600 focus:outline-0" value="<?= $data['nama_pembeli'] ?? '' ?>">
                </div>
                <div class="flex w-full">
                    <label class="w-48">Total Belanja</label>
                    <input required type="text" name="total_belanja" class="border border-gray-300 text-slate-600 rounded-sm w-full py-1 px-2 focus:border-gray-600 focus:outline-0" value="<?= $data['total_belanja'] ?? '' ?>">
                </div>                <div class="flex w-full">
                    <label class="w-48">Id Karyawan</label>
                    <input required type="text" name="id_karyawan" class="border border-gray-300 text-slate-600 rounded-sm w-full py-1 px-2 focus:border-gray-600 focus:outline-0" value="<?= $data['id_karyawan'] ?? '' ?>">
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
        const btnTambahTransaksi = document.querySelector("#tambahTransaksi");
        const btnCancel = document.querySelector("#batalTambah");

        btnTambahTransaksi.addEventListener('click', (e) => {
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