<?php 
include 'koneksi.php'; session_start(); 
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
?>

<?php 
include 'koneksi.php';

$query = "SELECT tb_kembalian.*, tb_buku.judul, tb_peminjam.tgl_pinjam, tb_peminjam.tgl_tempo,tb_kembalian.id_kembali, tb_kembalian.tgl_kembali, tb_anggota.nama_anggota
    FROM tb_peminjam
    JOIN tb_buku ON tb_buku.id_buku = tb_peminjam.id_buku
    JOIN tb_anggota ON tb_anggota.id_anggota = tb_peminjam.id_anggota
    JOIN tb_kembalian ON tb_peminjam.id_pinjam = tb_kembalian.id_pinjam";

$hasil = mysqli_query($koneksi, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_kembali = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_kembali[] = $row;
}
?>


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>HLZH</title>
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
                <hr /><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#" style="background: url('assets/img/books.png');background-size: cover;width: 70px;">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"></div>
                </a>
                <hr class="sidebar-divider my-0" style="width: 76px;background: rgb(25,0,179);height: 3px;" />
                <ul id="accordionSidebar" class="navbar-nav text-light">
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
                        <a class="nav-link active" href="data_pengembalian.php">
                            <i class="fa fa-check-square-o" style="color: rgba(0,0,0,0.3);font-size: 15px;"></i>
                            <span style="color: rgba(0,0,0,0.8);">Pengembalian &amp; Denda</span>
                        </a>
                        <a class="nav-link" href="data_buku.php">
                            <i class="fa fa-bookmark" style="color: rgba(0,0,0,0.3);font-size: 15px;"></i>
                            <span style="color: rgba(0,0,0,0.8);">Data buku</span>
                        </a><a class="nav-link" href="data_anggota.php">
                            <i class="fa fa-users" style="color: rgba(0,0,0,0.3);"></i>
                            <span style="color: rgba(0,0,0,0.8);">Data anggota</span>
                        </a>
                        <div class="container d-xl-flex" style="background: #acadb4;">
                            <span style="color: rgb(255,255,255);font-size: 14px;font-family: 'Open Sans', sans-serif;font-weight: bold;">L A P O R  A N</span>
                        </div>
                            <a class="nav-link" href="data_laporan.php">
                                <i class="fa fa-book" style="color: rgba(0,0,0,0.3);"></i>
                                <span style="color: rgba(0,0,0,0.8);">Laporan</span>
                            </a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline" style="color: rgb(50,0,0);">
                    <button id="sidebarToggle" class="btn rounded-circle border-0" type="button" style="color: rgb(102,30,30);background: rgb(172,173,180);border-color: rgba(32,39,86,0);"></button>
                </div>
            </div>
        </nav>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." />
                                <button class="btn btn-primary py-0" type="button" style="background: rgb(199,193,236);border-color: rgb(255, 255, 255);border-top-color: rgb(255,;border-right-color: 255,;border-bottom-color: 255);border-left-color: 255,;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." />
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo  $_SESSION['username']; ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/umaru.jpg" /></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fa fa-user-circle-o fa-sm fa-fw me-2 text-gray-400"></i> Account</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Data Pengembalian</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Informasi Pengembalian</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No Pengembalian</th>
                                            <th>Judul Buku</th>
                                            <th>Nama Peminjam</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Jatuh Tempo</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Denda</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                     $no = 1;
                                     foreach ($data_kembali as $kembali) { 
                                    ?>
                                    <tbody>    
                                        <tr class="text-center">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $kembali['judul'] ?></td>
                                            <td><?php echo $kembali['nama_anggota'] ?></td>
                                            <td><?php echo $kembali['tgl_pinjam'] ?></td>
                                            <td><?php echo $kembali['tgl_tempo'] ?></td>
                                            <td><?php echo $kembali['tgl_kembali'] ?></td>
                                            <td><?php echo $kembali['denda'] ?></td>
                                            <td>
                                            <a href="hapus_kembali.php?id_kembali=<?php echo $kembali['id_kembali'] ?>" onclick="return confirm('anda yakin akan menghapus data?')">
                                                <i class="fas ms-1 me-1 fa-trash btn btn-danger btn-sm fs-6 fw-bold"></i>
                                            </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>