<?php
include 'koneksi.php';
$id_buku = $_GET['id'];
$delete = mysqli_query($koneksi,"DELETE FROM tb_buku WHERE id_buku = $id_buku");
if($delete){
    header("Location: data_buku.php");
    }else{
        $message = "Data Anggota Gagal Dihapus, Silahkan Ulangi";
    echo "<script>alert('$message');document.location='data_buku.php'</script>";
    }
?>