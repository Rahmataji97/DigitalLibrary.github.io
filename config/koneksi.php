<?php
	$url = "http://localhost:/Library/";
	$host	="localhost";
	$user	="root";
	$pass	="";
	$db		="digital_library";	 
	$koneksi = mysqli_connect($host,$user,$pass,$db);
	// Cek Koneksi
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
?>