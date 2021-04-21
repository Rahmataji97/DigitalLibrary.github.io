<?php
	include "../config/koneksi.php";
	$action=$_GET['action'];
	if($action=='1'){
		$firstname 	= $_POST['first-name'];
		$lastname  	= $_POST['last-name'];
		$email 		= $_POST['email'];
		$phone 		= $_POST['phone'];
		$message	= $_POST['message'];
		
		$sql = "insert into pesan(nama_depan, nama_belakang, email, telpon, pesan)
				values('$firstname','$lastname','$email','$phone','$message')";
				
		$result = mysqli_query($koneksi, $sql);
		if($result){
			echo "<script>alert('Pesan Terkirim, Admin Akan Segera Memverifikasi dan Membalas Pesan Anda, Terimakasih.')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."view/kontak.php'>";
		}
	}
	else{
		$idpesan 	= $_GET['idpesan'];
		
		$sql= "delete from pesan where id=$idpesan";
		
		$result = mysqli_query($koneksi, $sql);
		if($result){
			echo "<script>alert('Pesan Telah Terhapus.')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/pesan/pesan.php'>";
		}
	
	}
	
	

?>