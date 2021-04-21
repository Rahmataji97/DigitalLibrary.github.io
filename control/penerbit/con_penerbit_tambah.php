<?php
	include "../../config/koneksi.php";
	
	$nama	= $_POST['nama'];
	$gambar	= $_FILES['gambar']['name'];
	$tmp	= $_FILES['gambar']['tmp_name'];
	
	$gambarbaru = date('dmYHis').$gambar;
	
	$path = "../../images/penerbit/".$gambarbaru;
	
	if($gambar)
	{
		if(move_uploaded_file($tmp, $path))
		{
			$sql = "insert into penerbit(nama, gambar) values('$nama', '$gambarbaru')";
			$sqlexe = mysqli_query($koneksi, $sql);
			if($sqlexe) 
			{
				echo "<script>alert('Data Berhasil Disimpan!')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit_tambah.php'>";
			}
			else
			{
				echo "<script>alert('Data Gagal Disimpan!')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit_tambah.php'>";
			}
		}
		else
		{
			echo "<script>alert('Gambar Tidak Bisa DiUpload, Penyimpanan Data Gagal!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit_tambah.php'>";
		}
	}
	else
	{
		$sql = "insert into penerbit(nama) values('$nama')";
		$sqlexe = mysqli_query($koneksi, $sql);
		if($sqlexe) 
		{
			echo "<script>alert('Data Berhasil Disimpan!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit_tambah.php'>";
		}
		else
		{
			echo "<script>alert('Data Gagal Disimpan!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit_tambah.php'>";
		}
	}
	
	
?>