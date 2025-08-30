<?php
$currentPage = basename($_SERVER['REQUEST_URI']);
$activeLink = 'bg-gray-800 text-white';
?>
<nav class="w-full my-4 flex justify-center gap-4 p-2 outline-2 rounded-xl">
    <a href="../karyawan" class="p-2 rounded-xl duration-300 hover:bg-gray-800 hover:text-white <?= $currentPage === 'karyawan' ? $activeLink : '' ?>">Karyawan</a>
    <a href="../barang" class="p-2 rounded-xl duration-300 hover:bg-gray-800 hover:text-white <?= $currentPage === 'barang' ? $activeLink : '' ?>">Barang</a>
    <a href="../transaksi" class="p-2 rounded-xl duration-300 hover:bg-gray-800 hover:text-white <?= $currentPage === 'transaksi' ? $activeLink : '' ?>">Transaksi</a>
    <a href="../detail-transaksi" class="p-2 rounded-xl duration-300 hover:bg-gray-800 hover:text-white <?= $currentPage === 'detail-transaksi' ? $activeLink : '' ?>">Detail Transaksi</a>
</nav>
