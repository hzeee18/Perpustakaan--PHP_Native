<?php 
include 'koneksi.php';
include 'fungsi.php';

$id_pinjam = $_POST['id_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$denda = $_POST['denda'];


$query = "INSERT INTO tb_kembalian (id_pinjam, tgl_kembali, denda) 
    VALUES ($id_pinjam, '$tgl_kembali', $denda)";

$hasil = mysqli_query($koneksi, $query);
if ($hasil == true) {
    // ambil buku_id berdasarkan pinjam_id
    $q = "SELECT tb_buku.id_buku FROM tb_buku JOIN tb_peminjam ON tb_buku.id_buku = tb_peminjam.id_buku WHERE tb_peminjam.id_pinjam = $id_pinjam";
    $hasil = mysqli_query($koneksi, $q);
    $hasil = mysqli_fetch_assoc($hasil);
    $id_buku = $hasil['id_buku'];

    tambah_stok($koneksi, $id_buku);
    // tambah stok

    $_SESSION['messages'] = '<font color="green">Pengembalian buku sukses!</font>';
    header('Location: data_peminjaman.php');
} else {
    header('Location: data_peminjaman.php'. $id_pinjam);
}

?>