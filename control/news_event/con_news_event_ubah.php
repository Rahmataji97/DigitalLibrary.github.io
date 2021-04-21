<?php
	include "../../config/koneksi.php";
	$id			= $_POST['id'];
	$nama		= $_POST['nama'];
	$deskripsi	= $_POST['deskripsi'];
	$tanggal1	= $_POST['tanggal1'];
	$tanggal2	= $_POST['tanggal2'];
	$jam1		= $_POST['jam1'];
	$jam2		= $_POST['jam2'];
	$gambarold 	= $_POST['gambar_old'];
	$gambar		= $_FILES['gambar']['name'];
	$tmp		= $_FILES['gambar']['tmp_name'];
	
	$gambarbaru = date('dmYHis').$gambar;
	
	$path = "../../images/news_event/".$gambarbaru;
	
	if($_FILES['gambar']['name'])
	{
		if(move_uploaded_file($tmp, $path))
		{
			$sql = "update news_event set nama='$nama', deskripsi='$deskripsi', tanggal1='$tanggal1', tanggal2='$tanggal2',
					jam1='$jam1', jam2='$jam2', gambar='$gambarbaru' where id=$id";
			$sqlexe = mysqli_query($koneksi, $sql);
			if($sqlexe) 
			{
				if(file_exists("../../images/news_event/".$gambarold))
				{
					unlink("../../images/news_event/".$gambarold);
				}
				echo "<script>alert('Data Berhasi Diupdate')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event.php'>";
			}
			else
			{
				unlink("../../images/news_event/".$gambarbaru);
				echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event_ubah.php?id=".$id."'>";
			}
		}
		else
		{
			echo "<script>alert('Maaf, Foto/Gambar gagal terupload')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event_ubah.php?id=".$id."'>";
		}
	}
	else
	{
		$sql = "update news_event set nama='$nama', deskripsi='$deskripsi', tanggal1='$tanggal1', tanggal2='$tanggal2',
					jam1='$jam1', jam2='$jam2' where id=$id";
		$sqlexe = mysqli_query($koneksi, $sql);
		if($sqlexe) 
		{
			echo "<script>alert('Data Berhasi Diupdate')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event.php'>";
		}
		else
		{
			echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk mengupdate data ke database.')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event_ubah.php?id=".$id."'>";
		}
	}
	
	
?>