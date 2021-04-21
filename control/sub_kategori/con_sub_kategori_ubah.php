<?php
	include "../../config/koneksi.php";
	$id			= $_POST['id'];
	$kategori_id = $_POST['kategori_id'];
	$nama		= $_POST['nama'];
	$deskripsi	= $_POST['deskripsi'];
	$gambarold 	= $_POST['gambar_old'];
	$gambar		= $_FILES['gambar']['name'];
	$tmp		= $_FILES['gambar']['tmp_name'];
	
	$gambarbaru = date('dmYHis').$gambar;
	
	$path = "../../images/sub_kategori/".$gambarbaru;
	
	if($_FILES['gambar']['name'])
	{
		if(move_uploaded_file($tmp, $path))
		{
			$sql = "update sub_kategori set kategori_id='$kategori_id', nama='$nama', deskripsi='$deskripsi', gambar='$gambarbaru' where id=$id";
			$sqlexe = mysqli_query($koneksi, $sql);
			if($sqlexe) 
			{
				if(!empty($gambarold)){
					if(file_exists("../../images/sub_kategori/".$gambarold))
					{
						unlink("../../images/sub_kategori/".$gambarold);
					}
				}
				echo "<script>alert('Data Berhasi Diupdate')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori.php'>";
			}
			else
			{
				echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori_ubah.php?id=".$id."'>";
			}
		}
		else
		{
			echo "<script>alert('Maaf, Foto/Gambar gagal terupload')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori_ubah.php?id=".$id."'>";
		}
	}
	else
	{
		$sql = "update sub_kategori set kategori_id='$kategori_id', nama='$nama', deskripsi='$deskripsi' where id=$id";
		$sqlexe = mysqli_query($koneksi, $sql);
		if($sqlexe) 
		{
			echo "<script>alert('Data Berhasi Diupdate')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori.php'>";
		}
		else
		{
			echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk mengupdate data ke database.')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori_ubah.php?id=".$id."'>";
		}
	}
	
	
?>