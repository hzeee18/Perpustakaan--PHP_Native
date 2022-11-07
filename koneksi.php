<?php 
	$koneksi = mysqli_connect('localhost','root','','perpustakaan');
	if (!$koneksi) {
	 	# code...
	 	echo "koneksi error bang".mysqli_connect_error();
	 } 
?>