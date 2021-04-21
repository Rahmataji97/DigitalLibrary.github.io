<?php
	include "../../config/koneksi.php";
	
	$id		= $_GET['id'];
	$pict	= '';
	
	$sql = "select * from penerbit where id=$id";
	$ls	 = mysqli_query($koneksi, $sql);
	
	foreach($ls as $row)
	{
		$pict = $row['gambar'];
	}
	
	$del = mysqli_query($koneksi, "delete from penerbit where id=$id");
	if($del)
	{
		if(!empty($pict)){
			if(file_exists("../../images/penerbit/".$pict))
				{
					unlink("../../images/penerbit/".$pict);
				}
			}
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit.php'>";
	}
	else
	{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/penerbit/penerbit.php'>";
	}
?>