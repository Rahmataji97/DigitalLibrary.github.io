<?php
	include "../../config/koneksi.php";
	
	$id		= $_GET['id'];
	$pict	= '';
	
	$sql = "select * from user where id=$id";
	$ls	 = mysqli_query($koneksi, $sql);
	
	foreach($ls as $row)
	{
		$pict = $row['gambar'];
	}
	
	$del = mysqli_query($koneksi, "delete from user where id=$id");
	if($del)
	{
		if(!empty($pict)){
			if(file_exists("../../images/user/".$pict))
			{
				unlink("../../images/user/".$pict);
			}
		}
		
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user.php'>";
	}
	else
	{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user.php'>";
	}
?>