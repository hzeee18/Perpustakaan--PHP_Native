<?php  
include 'koneksi.php';
include 'fungsi.php';

$id_pinjam          = $_POST['id_pinjam'];
$buku               = $_POST['buku'];
$anggota            = $_POST['anggota'];
$tgl_pinjam         = date('Y-m-d',strtotime($_POST['tgl_pinjam']));
$tgl_tempo          = strtotime("+10 day", strtotime($tgl_pinjam)); // +7 hari dari tgl peminjaman
$tgl_tempo          = date('Y-m-d', $tgl_tempo); // format tgl peminjaman tahun-bulan-hari

$stok = cek_stok($koneksi, $buku);

if ($stok < 1) {
    $_SESSION['messages'] = '<font color="red">Stok buku sudah habis, proses edit gagal!</font>';

    header('Location: data_peminjaman.php?id_pinjam=' . $id_pinjam);
    exit();
}

$q = "SELECT tb_buku.judul, tb_buku.id_buku, tb_peminjam.id_pinjam, tb_peminjam.id_anggota FROM tb_peminjam JOIN tb_buku ON tb_buku.id_buku = tb_peminjam.id_buku WHERE (tb_peminjam.id_buku = $buku AND tb_peminjam.id_anggota = '$anggota')";

$hasil_check = mysqli_query($koneksi, $q);
$data = mysqli_fetch_assoc($hasil_check);



$query = "UPDATE tb_peminjam SET id_buku = '$buku', id_anggota = '$anggota', tgl_pinjam = '$tgl_pinjam', tgl_tempo = '$tgl_tempo' WHERE id_pinjam = '$id_pinjam'";

$hasil = mysqli_query($koneksi, $query);

if ($hasil == true) {

    kurangi_stok($koneksi, $buku);
    
    $_SESSION['messages'] = '<font color="green">Proses edit data sukses!</font>';
    header('Location: data_peminjaman.php');
} else {
    $_SESSION['messages'] = '<font color="red">Proses edit gagal!</font>';
    header('Location: data_peminjaman.php?id_pinjam=' . $id_pinjam);
}
?>