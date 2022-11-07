<?php
include 'koneksi.php';
include 'fungsi.php';

if( isset( $_POST['tambah']) )
{
    $buku               = $_POST['buku'];
    $anggota            = $_POST['anggota'];
    $tgl_pinjam         = date('Y-m-d',strtotime($_POST['tgl_pinjam']));
    $tgl_tempo = strtotime("+10 day", strtotime($tgl_pinjam)); // +10 hari dari tgl peminjaman
    $tgl_tempo = date('Y-m-d', $tgl_tempo); // format tgl peminjaman tahun-bulan-hari

    $stok_buku = cek_stok($koneksi, $buku);

    if ($stok_buku < 1) {
        $_SESSION['messages'] = '<font color="red">Stok buku sudah habis, proses aaminjaman gagal!</font>';
        header('Location: peminjaman_buku.php');
        exit();
    }


    $sql = "INSERT INTO tb_peminjam (id_buku, id_anggota, tgl_pinjam, tgl_tempo) 
        VALUES ('$buku', $anggota, '$tgl_pinjam', '$tgl_tempo')";

    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil == true) {

        kurangi_stok($koneksi, $buku);

        $_SESSION['messages'] = '<font color="green">Peminjaman sukses!</font>';
        
        header('Location: data_peminjaman.php');
    } else {
        header('Location: data_peminjaman.php');
    }
}
?>