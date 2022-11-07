<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>
</head>
<body>
	<?php
	$label = "Semua Data Anggota";
	?>
<h3 style="text-align: center;">Laporan Data Anggota</h3>
	<?php echo $label ?>

	<table class="table" border="1" style="margin-top: 5px;">
		<tr align="center">
			<th>No</th>
            <th>ID</th>
            <th>Jenis Kelamin</th>
            <th>Nama Anggota</th>
            <th>Tanggal Lahir</th>
            <th>No Telp</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Alamat</th>
		</tr>

		<?php
		include 'koneksi.php';
            $no = 1;
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota"); // Eksekusi/Jalankan query dari variabel $query
            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

            if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql

				echo "<tr align='center'>";
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
	</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require 'assets/library/html2pdf/autoload.php';

$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Rekap Data Anggota.pdf', 'D');
?>