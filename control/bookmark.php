<?php
	include "../config/koneksi.php";
	session_start();
	$userid = $_SESSION['userid'];
	$ebookid = $_GET['ebook'];
	$tanggal = date('Y-m-d');
	$action  = $_GET['action'];
	$page    = $_GET['page'];
	$kode    = $_GET['kode'];
	$kategori = $_GET['kategori'];
	$keyword  = $_GET['keyword'];
	
	if($action=='1')
	{
		$ck = "select * from bookmark where user_id=$userid and ebook_id=$ebookid";
		$sck = mysqli_query($koneksi, $ck);
		$result = mysqli_num_rows($sck);
		if($result)
		{
			echo "<script>alert('E-Book ini sudah dibookmark')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."view/".$page.".php?kode=".$kode."&kategori=".$kategori."&keyword=".$keyword."'>";
		}
		else
		{
			$sql = "insert into bookmark(user_id, ebook_id, tanggal) values($userid, $ebookid, '$tanggal')";
			$sqle = mysqli_query($koneksi, $sql);
			
			if($sqle)
			{
				echo "<script>alert('Bookmark Success.')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."view/".$page.".php?kode=".$kode."&kategori=".$kategori."&keyword=".$keyword."'>";
			}
			else
			{	
				echo "<script>alert('Bookmark Failed')</script>";
				//echo $ck;
				echo "<meta http-equiv='refresh' content='0; url=".$url."view/".$page.".php?kode=".$kode."&kategori=".$kategori."&keyword=".$keyword."'>";
			}
		}
	}
	elseif($action=='0')
	{
		$sql = "delete from bookmark where user_id=$userid and ebook_id=$ebookid";
		$sqle = mysqli_query($koneksi, $sql);
		
		if($sqle)
		{
			echo "<script>alert('Delete Bookmark Success.')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."view/".$page.".php?kode=".$kode."&kategori=".$kategori."&keyword=".$keyword."'>";
		}
		else
		{	
			echo "<script>alert('Delete Bookmark Failed')</script>";
			//echo "<meta http-equiv='refresh' content='0; url=".$url."view/".$page.".php?kode=".$kode."&kategori=".$kategori."&keyword=".$keyword."'>";
		}
		
	}
?>