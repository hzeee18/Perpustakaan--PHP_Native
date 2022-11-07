<?php
session_start();

include 'koneksi.php';
include 'fungsi.php';

$id_pinjam = $_GET['id_pinjam'];
$status    = $_GET['status'];
$id_buku   = $_GET['id_buku'];

// cek stok buku
$stok_buku = cek_stok($koneksi, $id_buku);

if ($stok_buku < 1) {
	$_SESSION['messages'] = '<font color="red">Hapus data gagal!</font>';
    header('Location: data_peminjaman_buku.php');
    exit();
}

// Check status, jika pinjam maka data stok buku jumlahkan 1
if ($status == 'pinjam') {	
	tambah_stok($koneksi, $id_buku);
}

$query = "DELETE FROM tb_peminjam WHERE id_pinjam = $id_pinjam";
$hasil = mysqli_query($koneksi, $query);

if ($hasil == true) {
    header('location: data_peminjaman_buku.php');
} else {
	$_SESSION['messages'] = '<font color="red">Hapus data gagal!</font>';
    header('location: data_peminjaman.php');
}

?>