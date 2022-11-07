<?php

include 'koneksi.php';

$id_kembali = $_GET['id_kembali'];

$query = "DELETE FROM tb_kembalian WHERE id_kembali = $id_kembali";
$hasil = mysqli_query($koneksi, $query);

header('location: data_pengembalian.php');

?>