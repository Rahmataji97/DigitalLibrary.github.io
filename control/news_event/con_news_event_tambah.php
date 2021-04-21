<?php
	include "../../config/koneksi.php";
	
	$nama		= $_POST['nama'];
	$deskripsi	= $_POST['deskripsi'];
	$tanggal1	= $_POST['tanggal1'];
	$tanggal2	= $_POST['tanggal2'];
	$jam1		= $_POST['jam1'];
	$jam2		= $_POST['jam2'];
	$gambar		= $_FILES['gambar']['name'];
	$tmp		= $_FILES['gambar']['tmp_name'];
	
	$gambarbaru = date('dmYHis').$gambar;
	
	$path = "../../images/news_event/".$gambarbaru;
	
	if($gambar)
	{
		if(move_uploaded_file($tmp, $path))
		{
			$sql = "insert into news_event(nama, deskripsi, tanggal1, tanggal2, jam1, jam2, gambar) 
					values('$nama', '$deskripsi','$tanggal1','$tanggal2','$jam1','$jam2', '$gambarbaru')";
			$sqlexe = mysqli_query($koneksi, $sql);
			if($sqlexe) 
			{
				echo "<script>alert('Data Berhasil Disimpan!')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event_tambah.php'>";
			}
			else
			{
				unlink("../../images/news_event/".$gambarbaru);
				echo "<script>alert('Data Gagal Disimpan!')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event_tambah.php'>";
			}
		}
		else
		{
			echo "<script>alert('Gambar Tidak Bisa DiUpload, Penyimpanan Data Gagal!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event_tambah.php'>";
		}
	}
	else
	{
		$sql = "insert into news_event(nama, deskripsi, tanggal1, tanggal2, jam1, jam2) 
				values('$nama', '$deskripsi','$tanggal1','$tanggal2','$jam1','$jam2')";
		$sqlexe = mysqli_query($koneksi, $sql);
		if($sqlexe) 
		{
			echo "<script>alert('Data Berhasil Disimpan!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event_tambah.php'>";
		}
		else
		{
			echo "<script>alert('Data Gagal Disimpan!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event_tambah.php'>";
		}
	}
	
	
?>