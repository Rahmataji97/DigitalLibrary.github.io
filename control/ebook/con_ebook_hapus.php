<?php
	include "../../config/koneksi.php";
	
	$id		= $_GET['id'];
	$pict	= '';
	$fileupload = '';
	
	$sql = "select * from ebook where id=$id";
	$ls	 = mysqli_query($koneksi, $sql);
	
	foreach($ls as $row)
	{
		$pict = $row['gambar'];
		$fileupload = $row['file_upload'];
	}
	
	$del = mysqli_query($koneksi, "delete from ebook where id=$id");
	if($del)
	{
		if(!empty($pict)){
			if(file_exists("../../images/ebook/".$pict))
			{
				unlink("../../images/ebook/".$pict);
			}
		}
		if(!empty($fileupload)){
			if(file_exists("../../file_ebook/".$fileupload))
			{
				unlink("../../file_ebook/".$fileupload);
			}
		}
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook.php'>";
	}
	else
	{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook.php'>";
	}
?>