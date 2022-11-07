<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
			width: 10%;
			padding: 5px;
		}
	</style>
</head>
<body>
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
             $query = "SELECT tb_kembalian.*, tb_buku.judul, tb_peminjam.tgl_pinjam, tb_peminjam.tgl_tempo, tb_kembalian.id_kembali, tb_kembalian.tgl_kembali, tb_anggota.nama_anggota FROM tb_peminjam JOIN tb_buku ON tb_buku.id_buku = tb_peminjam.id_buku JOIN tb_anggota ON tb_anggota.id_anggota = tb_peminjam.id_anggota JOIN tb_kembalian ON tb_pinjaman.id_pinjam = tb_kembalian.id_pinjam WHERE (tgl_kembali BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
            $url_cetak = "print_pengembalian.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
?>
<h3 style="text-align: center;">Laporan Data Pengembalian</h3>

	<table class="table" border="1" width="50%" style="margin-top: 5px;">
		<tr align="center">
			<th>Tanggal Kembali</th>
            <th>No Pengembalian</th>
            <th>Judul Buku</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Jatuh Tempo</th>
            <th>Denda</th>
		</tr>

		<?php
		$no = 1;
		$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
		$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

		if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
			while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
				$tgl = date('d-m-Y', strtotime($data['tgl_pinjam'])); // Ubah format tanggal jadi dd-mm-yyyy

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
	</table>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require 'assets/library/html2pdf/autoload.php';

$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Rekap Data Pengembalian.pdf', 'D');
?>