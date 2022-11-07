<?php 
include 'koneksi.php'; session_start(); 
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
?>

<?php 

include 'koneksi.php';

if( isset( $_POST['submit']) )
{
    $rak        = $_POST['rak'];
    $id_buku    = $_POST['id_buku'];
    $judul      = $_POST['judul'];
    $pengarang  = $_POST['pengarang'];
    $penerbit   = $_POST['penerbit'];
    $thn_terbit = $_POST['thn_terbit'];
    $kategori   = $_POST['kategori'];
    $stok       = $_POST['stok'];
    $tgl_masuk  = $_POST['tgl_masuk'];

    $sql = "insert into tb_buku values ('','$rak','$id_buku','$judul','$pengarang','$penerbit','$thn_terbit','$kategori','$stok','$tgl_masuk')";
    $query = mysqli_query($koneksi, $sql);

    if($query) {
        header('Location: data_buku.php');
    } else {
        echo "ERRORRR";
    }
}
?>

<?php 

include 'koneksi.php';

if( isset( $_POST['update']) )
{
    $no         = $_POST['no'];
    $rak        = $_POST['rak'];
    $id_buku    = $_POST['id_buku'];
    $judul      = $_POST['judul'];
    $pengarang  = $_POST['pengarang'];
    $penerbit   = $_POST['penerbit'];
    $thn_terbit = $_POST['thn_terbit'];
    $kategori   = $_POST['kategori'];
    $stok       = $_POST['stok'];
    $tgl_masuk  = $_POST['tgl_masuk'];

    $update = mysqli_query($koneksi,"UPDATE tb_buku SET id_buku='$id_buku', rak='$rak', judul='$judul', pengarang='$pengarang', penerbit='$penerbit', thn_terbit='$thn_terbit', kategori='$kategori', stok='$stok', tgl_masuk='$tgl_masuk' WHERE no='$no'");

    if($update){
        header("Location: data_buku.php");
    }else{
        $message = "Nilai dan Data Siswa Gagal Diedit, Silahkan Ulangi";
        echo "<script>alert('$message');document.location='data_buku.php'</script>";
    }}

?>


<!DOCTYPE html>
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
                <hr><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#" style="background: url(&quot;assets/img/books.png&quot;);background-size: cover;width: 70px;">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"></div>
                </a>
                <hr class="sidebar-divider my-0" style="width: 76px;background: rgb(25,0,179);height: 3px;">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="color: rgb(103,80,80);">
                        <i class="fa fa-dashboard" style="color: rgb(178,178,178);"></i>
                        <span>Dashboard</span></a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_peminjaman.php">
                            <i class="fa fa-share-square-o" style="color: rgba(0,0,0,0.3);"></i>
                            <span style="color: rgba(0,0,0,0.8);">Peminjaman Buku</span>
                        </a>
                        <a class="nav-link" href="data_pengembalian.php">
                            <i class="fa fa-check-square-o" style="color: rgba(0,0,0,0.3);font-size: 15px;"></i>
                            <span style="color: rgba(0,0,0,0.8);">Pengembalian &amp; Denda</span>
                        </a>
                        <a class="nav-link active" href="data_buku.php">
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
                            <span style="color: rgba(0,0,0,0.8);">Laporan</span>
                        </a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline" style="color: rgb(50,0,0);">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="color: rgb(102,30,30);background: rgb(172,173,180);border-color: rgba(32,39,86,0);"></button>
                </div>
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
                                                <button class="btn btn-primary py-0" type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
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
                                        <img class="border rounded-circle img-profile" src="assets/img/avatars/umaru.jpg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-user-circle-o fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Account
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Data Buku</h3>
                    <div class="card shadow">
                        <div class="card-header py-3"><button class="btn btn-primary" type="button" style="background: rgb(172,173,180);border-color: rgba(255,255,255,0);" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-plus"></i></button></div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Rak</th>
                                            <th>ID Buku</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            include "koneksi.php";
                                            $no = 1;
                                            $show = mysqli_query($koneksi, "SELECT * FROM tb_buku ORDER BY rak");
                                            while ($data=mysqli_fetch_array($show)){

                                        ?>
                                        <tr>
                                            <td><?php echo $data['rak'] ?></td>
                                            <td><?php echo $data['id_buku'] ?></td>
                                            <td><?php echo $data['judul'] ?></td>
                                            <td><?php echo $data['pengarang'] ?></td>
                                            <td><?php echo $data['penerbit'] ?></td>
                                            <td><?php echo $data['thn_terbit'] ?></td>
                                            <td><?php echo $data['kategori'] ?></td>
                                            <td><?php echo $data['stok'] ?></td>
                                            <td><?php echo $data['tgl_masuk'] ?></td>
                                            <td>
                                                <a href="" data-bs-toggle="modal" data-bs-target="#addUpdate<?php echo $data['id_buku']; ?>">
                                                    <i
                                                        class="fas me-1 text-white far fa-edit btn btn-dark btn-sm fs-6 fw-bold"></i>
                                                </a>
                                                <a
                                                    href="hapus_buku.php?id='<?php echo $data['id_buku']?>'">
                                                    <i
                                                        class="fas ms-1 me-1 fa-trash btn btn-dark btn-sm fs-6 fw-bold"></i>
                                                </a>

                                                <!-- UPDATE DATA -->
                                                <div class="modal fade" id="addUpdate<?php echo $data['id_buku']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addUpdate">Update Data Anggota</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="input-group mb-3">
                                                                    <input type="hidden" name="no" value="<?php echo $data['no']; ?>">
                                                                    <span class="input-group-text" id="basic-addon1">ID Buku</span>
                                                                    <input type="number" name="id_buku" value="<?php echo $data['id_buku']; ?>" required class="form-control" placeholder="id_buku"
                                                                        aria-label="Nama" aria-describedby="basic-addon1">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">Rak</span>
                                                                    <input type="number" name="rak" value="<?php echo $data['rak']; ?>" required class="form-control" placeholder="No Rak"
                                                                        aria-label="Nama" aria-describedby="basic-addon1">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">Judul</span>
                                                                    <input type="text" name="judul" value="<?php echo $data['judul']; ?>" required class="form-control" placeholder="Judul"
                                                                        aria-label="Nama" aria-describedby="basic-addon1">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">Pengarang</span>
                                                                    <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" required class="form-control" placeholder="Nama"
                                                                        aria-label="Nama" aria-describedby="basic-addon1">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">Penerbit</span>
                                                                    <input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>" required class="form-control" placeholder="Nama"
                                                                        aria-label="Nama" aria-describedby="basic-addon1">
                                                                </div>
                                                                 <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">Tahun Terbit</span>
                                                                    <input type="number" name="thn_terbit" value="<?php echo $data['thn_terbit']; ?>" required class="form-control" placeholder="Tahun Terbit"
                                                                        aria-label="Nama" aria-describedby="basic-addon1">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <select name="kategori" required class="form-select"
                                                                        aria-label="Default select example">
                                                                        <?php $kls = $data['kategori']; ?>
                                                                        <option selected disabled selected>kategori</option>
                                                                        <option value="Pelajaran" <?php echo ($kls == 'Pelajaran') ? "selected": "" ?>>Pelajaran</option>
                                                                        <option value="Novel" <?php echo ($kls == 'Novel') ? "selected": "" ?>>Novel</option>
                                                                    </select>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">Stok</span>
                                                                    <input type="number" name="stok" value="<?php echo $data['stok']; ?>" required class="form-control" placeholder="Stok" aria-label="Nama" aria-describedby="basic-addon1">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">Tanggal Masuk</span>
                                                                        <input type="date" name="tgl_masuk" value="<?php echo $data['tgl_masuk']; ?>" required class="form-control" placeholder="Tanggal Masuk" aria-label="Nama" aria-describedby="basic-addon1">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                        <i class="fa fa-close"></i>
                                                                    </button>
                                                                    <input type="submit" name="update" class="btn btn-success text-white f-bold"
                                                                        value="simpan">
                                                                </div>
                                                            </form>
                                                        </div>   
                                                    </div>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ADD DATA ANGGOTA -->
            <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUser">Tambah Data Buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                            <div class="modal-body">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">No.Rak</span>
                                    <input type="number" name="rak" required class="form-control" placeholder="rak"
                                        aria-label="Nama" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">ID Buku</span>
                                    <input type="text" name="id_buku" required class="form-control" placeholder="ID Buku"
                                        aria-label="Nama" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Judul</span>
                                    <input type="text" name="judul" required class="form-control" placeholder="Judul Buku"
                                        aria-label="Nama" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Pengarang</span>
                                    <input type="text" name="pengarang" required class="form-control" placeholder="Pengarang"
                                        aria-label="Nama" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Penerbit</span>
                                    <input type="text" name="penerbit" required class="form-control" placeholder="Penerbit"
                                        aria-label="Nama" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Tahun Terbit</span>
                                    <input type="number" name="thn_terbit" required class="form-control" placeholder="Tahun Terbit"
                                        aria-label="Nama" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <select name="kategori" required class="form-select"
                                        aria-label="Default select example">
                                        <option selected disabled selected>Buku</option>
                                        <option value="Pelajaran">Pelajaran</option>
                                        <option value="Novel">Novel</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Stok</span>
                                    <input type="number" name="stok" required class="form-control" placeholder="Stok"
                                        aria-label="Nama" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Tanggal Masuk</span>
                                    <input type="date" name="tgl_masuk" required class="form-control" placeholder="Tanggal Masuk"
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
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
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