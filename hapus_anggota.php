<?php
include 'koneksi.php';
$id_anggota = $_GET['id'];
$delete = mysqli_query($koneksi,"DELETE FROM tb_anggota WHERE id_anggota = $id_anggota");
if($delete){
    header("Location: data_anggota.php");
    }else{
        $message = "Data Anggota Gagal Dihapus, Silahkan Ulangi";
    echo "<script>alert('$message');document.location='data_anggota.php'</script>";
    }
?>