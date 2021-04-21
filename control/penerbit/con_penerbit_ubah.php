<?php
	include "../../config/koneksi.php";
	$id			= $_POST['id_penerbit'];
	$nama		= $_POST['nama'];
	$gambarold 	= $_POST['gambar_old'];
	$gambar		= $_FILES['gambar']['name'];
	$tmp		= $_FILES['gambar']['tmp_name'];
	
	$gambarbaru = date('dmYHis').$gambar;
	
	$path = "../../images/penerbit/".$gambarbaru;
	
	if($gambar)
	{
		if(move_uploaded_file($tmp, $path))
		{
			$sql = "update penerbit set nama='$nama', gambar='$gambarbaru' where id=$id";
			$sqlexe = mysqli_query($koneksi, $sql);
			if($sqlexe) 
			{
				if(!empty($gambarold)){
					if(file_exists("../../images/penerbit/".$gambarold))
					{
						unlink("../../images/penerbit/".$gambarold);
					}
				}
				echo "<script>alert('Data Berhasi Diupdate')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit.php'>";
			}
			else
			{
				echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk mengupdate data ke database.')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit_ubah.php?id=".$id."'>";
			}
		}
		else
		{
			echo "<script>alert('Maaf, Foto/Gambar gagal terupload')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit_ubah.php?id=".$id."'>";
		}
	}
	else
	{
		$sql = "update penerbit set nama='$nama' where id=$id";
		$sqlexe = mysqli_query($koneksi, $sql);
		if($sqlexe) 
		{
			echo "<script>alert('Data Berhasi Diupdate')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit.php'>";
		}
		else
		{
			echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit_ubah.php?id=".$id."'>";
		}
	}
	
	
?>