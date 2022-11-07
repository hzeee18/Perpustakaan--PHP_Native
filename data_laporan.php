<?php 
include 'koneksi.php'; session_start(); 
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Laporan</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pragati+Narrow&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: rgb(255,255,255);color: rgb(255,255,255);">
            <div class="container-fluid d-flex flex-column p-0">
                <hr>
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#" style="background: url(&quot;assets/img/books.png&quot;);background-size: cover;width: 70px;">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"></div>
                </a>
                <hr class="sidebar-divider my-0" style="width: 76px;background: rgb(25,0,179);height: 3px;">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="color: rgb(103,80,80);">
                            <i class="fa fa-dashboard" style="color: rgb(178,178,178);"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_peminjaman.php">
                            <i class="fa fa-share-square-o" style="color: rgba(0,0,0,0.3);"></i>
                            <span style="color: rgba(0,0,0,0.8);">Peminjaman Buku</span>
                        </a>
                        <a class="nav-link" href="data_pengembalian.php">
                            <i class="fa fa-check-square-o" style="color: rgba(0,0,0,0.3);font-size: 15px;"></i>
                            <span style="color: rgba(0,0,0,0.8);">Pengembalian &amp; Denda</span>
                        </a>
                        <a class="nav-link" href="data_buku.php">
                            <i class="fa fa-bookmark" style="color: rgba(0,0,0,0.3);font-size: 15px;"></i>
                            <span style="color: rgba(0,0,0,0.8);">Data buku</span>
                        </a>
                        <a class="nav-link" href="data_anggota.php">
                            <i class="fa fa-users" style="color: rgba(0,0,0,0.3);"></i>
                            <span style="color: rgba(0,0,0,0.8);">Data anggota</span>
                        </a>
                        <div class="container d-xl-flex" style="background: #acadb4;">
                            <span style="color: rgb(255,255,255);font-size: 14px;font-family: 'Open Sans', sans-serif;font-weight: bold;">L A P O R&nbsp; A N</span>
                        </div>
                        <a class="nav-link active" href="data_laporan.php"><i class="fa fa-book" style="color: rgba(0,0,0,0.3);"></i><span style="color: rgba(0,0,0,0.8);">Laporan</span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline" style="color: rgb(50,0,0);"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="color: rgb(102,30,30);background: rgb(172,173,180);border-color: rgba(32,39,86,0);"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button" style="background: rgb(199,193,236);border-color: rgb(255, 255, 255);border-top-color: rgb(255,;border-right-color: 255,;border-bottom-color: 255);border-left-color: 255,;"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo  $_SESSION['username']; ?></span>
                                        <img class="border rounded-circle img-profile" src="assets/img/avatars/umaru.jpg">
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-user-circle-o fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Account
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Laporan</h3>
                    </div>
                    <div class="container mt-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php $p = @$_GET['p']; ?>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?php echo $p == '' || $p == 'anggota' ? 'active' : ''; ?>"
                                    href="data_laporan.php?p=anggota">Anggota</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?php echo $p == 'buku' ? 'active' : ''; ?>"
                                    href="data_laporan.php?p=buku">Buku</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?php echo $p == 'peminjaman' ? 'active' : ''; ?>"
                                    href="data_laporan.php?p=peminjaman">Peminjaman</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?php echo $p == 'pengembalian' ? 'active' : ''; ?>"
                                    href="data_laporan.php?p=pengembalian">Pengembalian</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <?php if($p == '' || $p == 'anggota'){ ?>
                                <div class="tab-pane fade show active"></div>
                                <a href="cetak_anggota.php"></a>
                                <div class="table-responsive">
                                    <div class="card-header py-3">
                                        <h3 style="text-align: center;">Laporan Anggota</h3>
                                        <div style="margin-top: 5px;">
                                            <a href="print_anggota.php">CETAK PDF</a>
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Lahir</th>
                                                <th>No telp</th>
                                                <th>Kelas</th>
                                                <th>Jurusan</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'koneksi.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota"); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                                            if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql

                                                    echo "<tr>";
                                                    echo "<td>".$no++."</td>";
                                                    echo "<td>".$data['no_identitas']."</td>";
                                                    echo "<td>".$data['jk']."</td>";
                                                    echo "<td>".$data['nama_anggota']."</td>";
                                                    echo "<td>".$data['tgl_lhr']."</td>";
                                                    echo "<td>".$data['tlp']."</td>";
                                                    echo "<td>".$data['kls']."</td>";
                                                    echo "<td>".$data['jurusan']."</td>";
                                                    echo "<td>".$data['alamat']."</td>";
                                                    echo "</tr>";
                                                }
                                            }else{ // Jika data tidak ada
                                                echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php }elseif($p == '' || $p == 'buku'){ ?>
                                <div class="tab-pane fade show active"></div>
                                <a href="cetak_anggota.php"></a>
                                <div class="table-responsive">
                                    <div class="card-header py-3">
                                        <h3 style="text-align: center;">Laporan Buku</h3>
                                        <div style="margin-top: 5px;">
                                            <a href="print_anggota.php">CETAK PDF</a>
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Rak</th>
                                                <th>Judul</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>tahun Terbit</th>
                                                <th>Kategori</th>
                                                <th>Stok</th>
                                                <th>Tanggal Masuk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'koneksi.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_buku"); // Eksekusi/Jalankan query dari variabel $query
                                            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                                            if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql

                                                    echo "<tr>";
                                                    echo "<td>".$no++."</td>";
                                                    echo "<td>".$data['id_buku']."</td>";
                                                    echo "<td>".$data['rak']."</td>";
                                                    echo "<td>".$data['judul']."</td>";
                                                    echo "<td>".$data['pengarang']."</td>";
                                                    echo "<td>".$data['penerbit']."</td>";
                                                    echo "<td>".$data['thn_terbit']."</td>";
                                                    echo "<td>".$data['kategori']."</td>";
                                                    echo "<td>".$data['stok']."</td>";
                                                    echo "<td>".$data['tgl_masuk']."</td>";
                                                    echo "</tr>";
                                                }
                                            }else{ // Jika data tidak ada
                                                echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php }elseif($p == 'peminjaman'){ ?>
                                <div class="tab-pane fade show active"></div>
                                 <form method="post" action="data_laporan.php?p=peminjaman">
                                    <div class="row">
                                        <div class="col">
                                            <i class="fa fa-calendar-times-o" style="font-size: 21px;"></i>
                                            <input type="date" name="tgl_awal" value="tgl_awal" style="height: 26px;">
                                            <label class="form-label" style="margin-left: 10px;">s/d</label>
                                            <i class="fa fa-calendar-times-o" style="font-size: 21px;margin-left: 7px;"></i>
                                            <input type="date" name="tgl_akhir" value="tgl_akhir" style="height: 26px;">
                                            <button class="btn btn-primary" type="submit" name="filter" value="true" style="margin-left: 5px;height: 34px;line-height: 20px;">Filter</button>
                                        </div>
                                    </div>

                                    <?php
                                    if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                                        echo '<a href="data_laporan.php?p=peminjaman" class="btn btn-default">RESET</a>';
                                    ?>
                                </form>
                                <?php
                                    include "koneksi.php";

                                    $tgl_awal = @$_POST['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
                                    $tgl_akhir = @$_POST['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

                                    if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
                                        // Buat query untuk menampilkan semua data transaksi
                                        $query = "SELECT tb_peminjam.*,tb_peminjam.id_pinjam as id_peminjam, tb_buku.id_buku ,tb_buku.judul, tb_anggota.nama_anggota, (SELECT tgl_kembali FROM tb_kembalian JOIN tb_peminjam ON tb_kembalian.id_pinjam = tb_peminjam.id_pinjam WHERE tb_kembalian.id_pinjam = id_peminjam) as tgl_kembali FROM tb_peminjam JOIN tb_buku ON tb_buku.id_buku = tb_peminjam.id_buku JOIN tb_anggota ON tb_anggota.id_anggota = tb_peminjam.id_anggota";
                                        $url_cetak = "print_peminjaman.php";
                                        $label = "Semua Data Peminjaman";
                                    }else{ // Jika terisi
                                        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
                                        $query = "SELECT tb_peminjam.*,tb_peminjam.id_pinjam as id_peminjam, tb_buku.id_buku ,tb_buku.judul, tb_anggota.nama_anggota, (SELECT tgl_kembali FROM tb_kembalian JOIN tb_peminjam ON tb_kembalian.id_pinjam = tb_peminjam.id_pinjam WHERE tb_kembalian.id_pinjam = id_peminjam) as tgl_kembali FROM tb_peminjam JOIN tb_buku ON tb_buku.id_buku = tb_peminjam.id_buku JOIN tb_anggota ON tb_anggota.id_anggota = tb_peminjam.id_anggota WHERE (tgl_pinjam BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
                                        $url_cetak = "print_peminjaman.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
                                        $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
                                        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
                                        $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
                                    }
                                    ?>
                                    <br>
                                    <br>
                                    <h3 style="text-align: center;">Laporan Buku</h3>

                                    <div style="margin-top: 5px;">
                                        <a href="<?php echo $url_cetak ?>">CETAK PDF</a>
                                    </div>

                                    <div class="table-responsive" style="margin-top: 10px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>TGL Pinjam</th>
                                                    <th>No Peminjaman</th>
                                                    <th>Judul Buku</th>
                                                    <th>Nama Peminjam</th>
                                                    <th>TGL Jatuh Tempo</th>
                                                    <th>TGL Kembali</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                                                $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                                                if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                                    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                                                        $tgl = date('d-m-Y', strtotime($data['tgl_pinjam'])); // Ubah format tanggal jadi dd-mm-yyyy

                                                        echo "<tr>";
                                                        echo "<td>".$tgl."</td>";
                                                        echo "<td>".$no++."</td>";
                                                        echo "<td>".$data['judul']."</td>";
                                                        echo "<td>".$data['nama_anggota']."</td>";
                                                        echo "<td>".$data['tgl_tempo']."</td>";
                                                        echo "<td>".$data['tgl_kembali']."</td>";
                                                        echo "</tr>";
                                                    }
                                                }else{ // Jika data tidak ada
                                                    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="tab-pane fade show active"></div>
                                <?php
                                    include "koneksi.php";

                                    $tgl_awal = @$_POST['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
                                    $tgl_akhir = @$_POST['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

                                    if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
                                        // Buat query untuk menampilkan semua data transaksi
                                        $query = "SELECT tb_kembalian.*, tb_buku.judul, tb_peminjam.tgl_pinjam, tb_peminjam.tgl_tempo, tb_kembalian.id_kembali, tb_kembalian.tgl_kembali, tb_anggota.nama_anggota FROM tb_peminjam JOIN tb_buku ON tb_buku.id_buku = tb_peminjam.id_buku JOIN tb_anggota ON tb_anggota.id_anggota = tb_peminjam.id_anggota JOIN tb_kembalian ON tb_peminjam.id_pinjam = tb_kembalian.id_pinjam";
                                        $url_cetak = "print_pengembalian.php";
                                        $label = "Semua Data Pengembalian";
                                    }else{ // Jika terisi
                                        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
                                        $query = "SELECT tb_kembalian.*, tb_buku.judul, tb_peminjam.tgl_pinjam, tb_peminjam.tgl_tempo, tb_kembalian.id_kembali, tb_kembalian.tgl_kembali, tb_anggota.nama_anggota FROM tb_peminjam JOIN tb_buku ON tb_buku.id_buku = tb_peminjam.id_buku JOIN tb_anggota ON tb_anggota.id_anggota = tb_peminjam.id_anggota JOIN tb_kembalian ON tb_peminjam.id_pinjam = tb_kembalian.id_pinjam WHERE (tgl_kembali BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
                                        $url_cetak = "print_pengembalian.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
                                        $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
                                        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
                                        $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
                                    }
                            ?>
                                <form  method="post" action="data_laporan.php?p=pengembalian">
                                    <div class="row">
                                        <div class="col">
                                            <i class="fa fa-calendar-times-o" style="font-size: 21px;"></i>
                                            <input type="date" name="tgl_awal" value="tgl_awal" style="height: 26px;">
                                            <label class="form-label" style="margin-left: 10px;">s/d</label>
                                            <i class="fa fa-calendar-times-o" style="font-size: 21px;margin-left: 7px;"></i>
                                            <input type="date" name="tgl_akhir" value="tgl_akhir" style="height: 26px;">
                                            <button class="btn btn-primary" type="submit" name="filter" value="true" style="margin-left: 5px;height: 34px;line-height: 20px;">filter</button>
                                        </div>
                                    </div>
                                    <?php
                                        if(isset($_POST['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                                            echo '<a href="data_laporan.php?p=pengembalian" class="btn btn-default">RESET</a>';
                                    ?>
                                </form>
                                </div>
                                    <br>
                                    <br>
                                    <h3 style="text-align: center;">Laporan Pengembalian</h3>

                                    <div style="margin-top: 5px;">
                                        <a href="<?php echo $url_cetak ?>">CETAK PDF</a>
                                    </div>
                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                        <table class="table my-0" id="dataTable">
                                            <thead>
                                                <tr align='center'>
                                                    <th>Tanggal Kembali</th>
                                                    <th>No Pengembalian</th>
                                                    <th>Judul Buku</th>
                                                    <th>Nama Peminjam</th>
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Tanggal Jatuh Tempo</th>
                                                    <th>Denda</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                                                    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                                                    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                                        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                                                            $tgl = date('d-m-Y', strtotime($data['tgl_kembali'])); // Ubah format tanggal jadi dd-mm-yyyy

                                                            echo "<tr align='center'>";
                                                            echo "<td>".$tgl."</td>";
                                                            echo "<td>".$no++."</td>";
                                                            echo "<td>".$data['judul']."</td>";
                                                            echo "<td>".$data['nama_anggota']."</td>";
                                                            echo "<td>".$data['tgl_pinjam']."</td>";
                                                            echo "<td>".$data['tgl_tempo']."</td>";
                                                            echo "<td>".$data['denda']."</td>";
                                                            echo "</tr>";
                                                        }
                                                    }else{ // Jika data tidak ada
                                                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                                                    }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr></tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>hlzh.nr</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <!-- Include File JS Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Include library Bootstrap Datepicker -->
    <script src="libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Include File JS Custom (untuk fungsi Datepicker) -->
    <script src="assets/js/custom.js"></script>

    <script>
    $(document).ready(function(){
        setDateRangePicker(".tgl_awal", ".tgl_akhir")
    })
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>