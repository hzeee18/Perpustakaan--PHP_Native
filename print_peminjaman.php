<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>
	<style>
		.table {
			border-collapse:collapse;
			table-layout:fixed;width: 400px;
		}
		.table th {
			padding: 5px;
		}
		.table td {
			word-wrap:break-word;
			width: 18%;
			padding: 5px;
		}
	</style>
</head>
<body>
	<?php
	// Load file koneksi.php
	include "koneksi.php";

	$tgl_awal = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
	$tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

	if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
		// Buat query untuk menampilkan semua data transaksi
		$query = "SELECT tb_peminjam.*,tb_peminjam.id_pinjam as id_peminjam, tb_buku.id_buku ,tb_buku.judul, tb_anggota.nama_anggota, (SELECT tgl_kembali FROM tb_kembalian JOIN tb_peminjam ON tb_kembalian.id_pinjam = tb_peminjam.id_pinjam WHERE tb_kembalian.id_pinjam = id_peminjam) as tgl_kembali FROM tb_peminjam JOIN tb_buku ON tb_buku.id_buku = tb_peminjam.id_buku JOIN tb_anggota ON tb_anggota.id_anggota = tb_peminjam.id_anggota";

		$label = "Semua Data Transaksi";
	}else{ // Jika terisi
		// Buat query untuk menampilkan data transaksi sesuai periode tanggal
		$query = "SELECT tb_peminjam.*,tb_peminjam.id_pinjam as id_peminjam, tb_buku.id_buku ,tb_buku.judul, tb_anggota.nama_anggota, (SELECT tgl_kembali FROM tb_kembalian JOIN tb_peminjam ON tb_kembalian.id_pinjam = tb_peminjam.id_pinjam WHERE tb_kembalian.id_pinjam = id_peminjam) as tgl_kembali FROM tb_peminjam JOIN tb_buku ON tb_buku.id_buku = tb_peminjam.id_buku JOIN tb_anggota ON tb_anggota.id_anggota = tb_peminjam.id_anggota WHERE (tgl_pinjam BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";

		$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
		$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
		$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
	}
	?>
	<h3 style="text-align: center;">Laporan Data Peminjam</h3>

	<table class="table" border="1" width="50%" style="margin-top: 5px;">
		<tr align="center">
			<th>Tanggal Pinjam</th>
            <th>Judul Buku</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Jatuh Tempo</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
		</tr>

		<?php
		$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
		$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

		if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
			while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
				$tgl = date('d-m-Y', strtotime($data['tgl_pinjam'])); // Ubah format tanggal jadi dd-mm-yyyy

				echo "<tr align='center'>";
                echo "<td>".$tgl."</td>";
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
	</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require 'assets/library/html2pdf/autoload.php';

$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Rekap Data Peminjaman.pdf', 'D');
?>