<?php
// $currentPage = basename($_SERVER['REQUEST_URI']);
    $currentFolder = basename(dirname($_SERVER['SCRIPT_NAME']));

    // Fungsi untuk menentukan class aktif
    function isActive($page) {
        global $currentFolder;
        return $currentFolder === $page
            ? 'bg-gray-800 text-white'
            : 'hover:bg-gray-800 hover:text-white';
    }
?>

<nav class="w-full my-4 flex justify-center gap-4 p-2 outline-2 rounded-xl">
    <a href="../karyawan" class="p-2 rounded-xl duration-300 <?= isActive('karyawan') ?>">Karyawan</a>
    <a href="../barang" class="p-2 rounded-xl duration-300 <?= isActive('barang') ?>">Barang</a>
    <a href="../transaksi" class="p-2 rounded-xl duration-300 <?= isActive('transaksi') ?>">Transaksi</a>
</nav>
