<?php

function hitung_denda($tgl_kembali, $tgl_tempo)
{
    if (strtotime( $tgl_kembali ) > strtotime($tgl_tempo)) {
        $kembali = new DateTime($tgl_kembali); 
        $jatuh_tempo   = new DateTime($tgl_tempo); 

        $selisih = $kembali->diff($jatuh_tempo);
        $selisih = $selisih->format('%d');

        $denda = 2000 * $selisih;
    } else {
        $denda = 0;
    }

    return $denda;
}

function cek_stok($koneksi, $id_buku)
{
    $q = "SELECT stok FROM tb_buku WHERE id_buku = $id_buku";
    $hasil = mysqli_query($koneksi, $q);
    $hasil = mysqli_fetch_assoc($hasil);
    $stok = $hasil['stok'];

    return $stok;
}

function kurangi_stok($koneksi, $id_buku)
{
    $q = "UPDATE tb_buku SET stok = stok - 1 WHERE id_buku = $id_buku";
    mysqli_query($koneksi, $q);
}

function tambah_stok($koneksi, $id_buku)
{
    $q = "UPDATE tb_buku SET stok = stok + 1 WHERE id_buku = $id_buku";
    mysqli_query($koneksi, $q);
}


?>