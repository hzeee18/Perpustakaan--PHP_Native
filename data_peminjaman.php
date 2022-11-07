<?php 
include 'koneksi.php'; session_start(); 
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
?>

<?php
include 'fungsi.php';
include 'koneksi.php';

$query = "SELECT tb_peminjam.*,tb_peminjam.id_pinjam as id_peminjam, tb_buku.id_buku ,tb_buku.judul, tb_anggota.nama_anggota, (SELECT tgl_kembali FROM tb_kembalian JOIN tb_peminjam ON tb_kembalian.id_pinjam = tb_peminjam.id_pinjam WHERE tb_kembalian.id_pinjam = id_peminjam) as tgl_kembali FROM tb_peminjam JOIN tb_buku ON tb_buku.id_buku = tb_peminjam.id_buku JOIN tb_anggota ON tb_anggota.id_anggota = tb_peminjam.id_anggota";

$hasil = mysqli_query($koneksi, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_pinjam = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_pinjam[] = $row;
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
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
                <hr><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#" style="background: url(&quot;assets/img/books.png&quot;);background-size: cover;width: 70px;">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"></div>
                </a>
                <hr class="sidebar-divider my-0" style="width: 76px;background: rgb(25,0,179);height: 3px;">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="color: rgb(103,80,80);">
                        <i class="fa fa-dashboard" style="color: rgb(178,178,178);"></i>
                        <span>Dashboard</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="data_peminjaman.php">
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
                        <a class="nav-link" href="data_laporan.php">
                            <i class="fa fa-book" style="color: rgba(0,0,0,0.3);"></i>
                            <span style="color: rgba(0,0,0,0.8);">Laporan</span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline" style="color: rgb(50,0,0);"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="color: rgb(102,30,30);background: rgb(172,173,180);border-color: rgba(32,39,86,0);"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <button class="btn btn-primary py-0" type="button" style="background: rgb(199,193,236);border-color: rgb(255, 255, 255);border-top-color: rgb(255,;border-right-color: 255,;border-bottom-color: 255);border-left-color: 255,;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow">
                                <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group">
                                            <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button>
                                            </div>
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
                <div class="container">
                    <h1>Peminjam Buku</h1>
                </div>
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3"><button class="btn btn-primary" type="button" style="background: rgb(172,173,180);border-color: rgba(255,255,255,0);" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-plus"></i></button></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No Peminjaman</th>
                                            <th>Judul Buku</th>
                                            <th>Nama Peminjam</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Jatuh Tempo</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                         foreach ($data_pinjam as $pinjam) { 

                                        ?>
                                        <tr class="text-center">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $pinjam['judul'] ?></td>
                                            <td><?php echo $pinjam['nama_anggota'] ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_pinjam'])) ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_tempo'])) ?></td>
                                            <td><?php  
                                                if (empty($pinjam['tgl_kembali'])) {
                                                    echo "-";
                                                } 
                                                else {
                                                    echo date('d-m-Y', strtotime($pinjam['tgl_kembali']));
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php $status = '' ?>
                                                <?php if (empty($pinjam['tgl_kembali'])): ?>
                                                    pinjam
                                                <?php $status = 'pinjam' ?>
                                                <?php else: ?>
                                                    kembali
                                                <?php $status = 'kembali' ?>  
                                                <?php endif ?>
                                            </td>
                                            <td>
                                            <?php if (empty($pinjam['tgl_kembali'])){ ?>
                                                <a href="back.php?id_pinjaman=<?php echo $pinjam['id_pinjam'] ?>" title="klik untuk proses pengembalian">
                                                    <i class="fas me-1 text-white fa-check btn btn-success btn-sm fs-6 fw-bold"></i>
                                                </a>

                                                <a href="form_edit_peminjaman.php?id_pinjam=<?php echo $pinjam['id_pinjam']; ?>&&status=<?php echo $status; ?>">
                                                    <i class="fas me-1 text-white fa-edit btn btn-warning btn-sm fs-6 fw-bold"></i>
                                                </a>

                                                <!-- EDIT PINJAM -->
                                                <div class="modal fade" id="addUpdate<?php echo $pinjam['id_pinjam']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addUpdate">Update Data Peminjaman</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="proses_edit_peminjam.php" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="input-group mb-3">
                                                                    <input type="hidden" name="id_pinjam" value="<?php echo $pinjam['id_pinjam'] ?>">
                                                                </div>
                                                                
                                                                <div class="input-group mb-3">
                                                                    <select name="buku" required class="form-select"
                                                                        aria-label="Default select example">
                                                                        <?php
                                                                        include "koneksi.php";
                                                                        $show = mysqli_query($koneksi,"SELECT * FROM tb_buku");
                                                                        while($data = mysqli_fetch_array($show)){
                                                                        ?>
                                                                        <option value="<?php echo $data['id_buku'] ?>"<?php echo ($data['id_buku'] == $pinjam['id_buku']) ? 'selected' : '' ; ?>><?php echo $data['judul'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <select name="buku" required class="form-select"
                                                                        aria-label="Default select example">
                                                                        <?php
                                                                        include "koneksi.php";
                                                                        $show = mysqli_query($koneksi,"SELECT * FROM tb_anggota");
                                                                        while($data = mysqli_fetch_array($show)){
                                                                        ?>
                                                                        <option value="<?php echo $data['id_anggota'] ?>" <?php echo ($data['id_anggota'] == $pinjam['id_anggota']) ? 'selected' : '' ; ?>><?php echo $data['nama_anggota'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">Tanggal Pinjam</span>
                                                                    <input type="date" name="tgl_pinjam" value="<?php echo $pinjam['tgl_pinjam'] ?>" disabled required class="form-control" placeholder=""
                                                                        aria-label="Nama" aria-describedby="basic-addon1">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">Tanggal Harus Kembalikan</span>
                                                                    <input type="date" name="tgl_tempo" value="<?php echo $pinjam['tgl_tempo'] ?>" disabled required class="form-control" placeholder=""
                                                                        aria-label="Nama" aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                        <i class="fa fa-close"></i>
                                                                    </button>
                                                                    <input type="submit" name="submit" class="btn btn-success text-white f-bold"
                                                                        value="simpan">
                                                                </div>
                                                            </form>
                                                        </div>   
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <a href="hapus_peminjam.php?id_pinjam=<?php echo $pinjam['id_pinjam']; ?>&&status=<?php echo $status; ?>&&id_buku=<?php echo $pinjam['id_buku']; ?>"  onclick="return confirm('anda yakin akan menghapus data?')">
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
            </div>
            <?php
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <!-- ADD DATA ANGGOTA -->
            <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUser">Tambah Data Pinjam</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="proses_peminjam.php" method="POST">
                            <div class="modal-body">

                                <div class="input-group mb-3">
                                    <select name="anggota" required class="form-select"
                                        aria-label="Default select example">
                                        <option>=== Anggota ===</option>
                                        <?php
                                        include "koneksi.php";
                                        $show = mysqli_query($koneksi,"SELECT * FROM tb_anggota");
                                        while($data = mysqli_fetch_array($show)){
                                        ?>
                                        <option value="<?php echo $data['id_anggota'] ?>"><?php echo $data['nama_anggota'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="buku" required class="form-select"
                                        aria-label="Default select example">
                                        <option>=== Buku ===</option>
                                        <?php
                                        include "koneksi.php";
                                        $show = mysqli_query($koneksi,"SELECT * FROM tb_buku");
                                        while($data = mysqli_fetch_array($show)){
                                        ?>
                                        <option value="<?php echo $data['id_buku'] ?>"><?php echo $data['judul'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Tanggal Pinjam</span>
                                    <input type="date" id="tgl_pinjam" name="tgl_pinjam" required class="form-control" placeholder="Nama"
                                        aria-label="Nama" aria-describedby="basic-addon1">
                                        <script>
                                            var dt = new Date();
                                            document.getElementById("tgl_pinjam").valueAsDate = new Date();
                                            var today = moment().format('DD-MM-YYYY');
                                            document.getElementById("tgl_pinjam").value = today
                                        </script>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="fa fa-close"></i>
                                </button>
                                <input type="submit" name="tambah" class="btn btn-success text-white f-bold"
                                    value="simpan">
                            </div>
                        </form>
                    </div>      
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