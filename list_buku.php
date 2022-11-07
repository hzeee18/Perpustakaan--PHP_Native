<?php
include 'koneksi.php';

$query = "SELECT * FROM tb_buku";

$hasil = mysqli_query($koneksi, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_buku = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_buku[] = $row;
}


$query2 = "SELECT * FROM tb_anggota";

$hasil2 = mysqli_query($koneksi, $query2);

// ... menampung semua data kategori
$data_anggota = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row1 = mysqli_fetch_assoc($hasil2)) {
    $data_anggota[] = $row1;
}

?>