<?php
	include "../../config/koneksi.php";
	
	$id		= $_GET['id'];
	$pict	= '';
	
	$sql = "select * from news_event where id=$id";
	$ls	 = mysqli_query($koneksi, $sql);
	
	foreach($ls as $row)
	{
		$pict = $row['gambar'];
	}
	
	$del = mysqli_query($koneksi, "delete from news_event where id=$id");
	if($del)
	{
		if(file_exists("../../images/news_event/".$pict))
			{
				unlink("../../images/news_event/".$pict);
			}
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event.php'>";
	}
	else
	{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/news_event/news_event.php'>";
	}
?>