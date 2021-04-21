<?php
	include "../../config/koneksi.php";
	
	$kategori_id	= $_POST['kategori_id'];
	$nama	= $_POST['nama'];
	$deskripsi = $_POST['deskripsi'];
	$gambar	= $_FILES['gambar']['name'];
	$tmp	= $_FILES['gambar']['tmp_name'];
	
	$gambarbaru = date('dmYHis').$gambar;
	
	$path = "../../images/sub_kategori/".$gambarbaru;
	
	if($gambar)
	{
		if(move_uploaded_file($tmp, $path))
		{
			$sql = "insert into sub_kategori(kategori_id, nama, deskripsi, gambar) values('$kategori_id', '$nama', '$deskripsi', '$gambarbaru')";
			$sqlexe = mysqli_query($koneksi, $sql);
			if($sqlexe) 
			{
				echo "<script>alert('Data Berhasil Disimpan!')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori.php'>";
			}
			else
			{
				echo "<script>alert('Data Gagal Disimpan!')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori_tambah.php'>";
			}
		}
		else
		{
			echo "<script>alert('Gambar Tidak Bisa DiUpload, Penyimpanan Data Gagal!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori_tambah.php'>";
		}
	}
	else
	{
		$sql = "insert into sub_kategori(kategori_id, nama, deskripsi) values('$kategori_id', '$nama', '$deskripsi')";
		$sqlexe = mysqli_query($koneksi, $sql);
		if($sqlexe) 
		{
			echo "<script>alert('Data Berhasil Disimpan!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori.php'>";
		}
		else
		{
			echo "<script>alert('Data Gagal Disimpan!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori_tambah.php'>";
		}
	}
	
	
?>