<?php
	include "../../config/koneksi.php";
	
	$id		= $_GET['id'];
	$pict	= '';
	
	$sql = "select * from sub_kategori where id=$id";
	$ls	 = mysqli_query($koneksi, $sql);
	
	foreach($ls as $row)
	{
		$pict = $row['gambar'];
	}
	
	$del = mysqli_query($koneksi, "delete from sub_kategori where id=$id");
	if($del)
	{
		if(!empty($pict)){
			if(file_exists("../../images/sub_kategori/".$pict))
				{
					unlink("../../images/sub_kategori/".$pict);
				}
		}	
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori.php'>";
	}
	else
	{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/sub_kategori/sub_kategori.php'>";
	}
?>