<?php
	include "../../config/koneksi.php";
	
	//create code user
	$act = '';
	if(isset($_GET['action'])){
		$act = $_GET['action'];
	}
	$kode		 = '';
	$sq = "select * from user order by kode DESC Limit 0,1";
	$sqc = mysqli_query($koneksi,$sq);
	$rx = mysqli_num_rows($sqc);
	
	if(empty($rx))
	{
		$numb = 1;
	}
	else
	{
		foreach($sqc as $rows)
		{
			$kode = substr($rows['kode'],3,4);
		}
		$numb = (int)$kode + 1;
	}
	
	if($numb>=1 && $numb<=9){
		$kode = 'A-000'.$numb;
	}
	elseif($numb>=10 && $numb<=99){
		$kode = 'A-00'.$numb;
	}
	elseif($numb>=100 && $numb<=999){
		$kode = 'A-0'.$numb;
	}
	elseif($numb>=1000){
		$kode = 'A-'.$numb;
	}
	
	$nama		 = $_POST['nama'];
	$username 	 = $_POST['user_name']; 
	$pass		 = "";
	$pass2 		 = "";
	if($_POST['pass']){
		$pass	 = MD5($_POST['pass']);
		$pass2	 = MD5($_POST['pass2']);
	}
	$posisi 	 = $_POST['posisi'];
	$aktif	 = '0';
	//`id`, `kode`, `nama`, `user_name`, `pass`, `posisi`, `aktif`, `gambar`
		
	$aktif = 0;
	if(isset($_POST['aktif']))
	{
		$aktif	 = $_POST['aktif'];
	}
	$gambar		= $_FILES['gambar']['name'];
	$tmp		= $_FILES['gambar']['tmp_name'];
	$gambarbaru = date('dmYHis').$gambar;
	$path = "../../images/user/".$gambarbaru;
	
	if($_FILES['gambar']['name'])
	{
		if(move_uploaded_file($tmp, $path))
		{
			if($pass!="")
			{
				if($pass != $pass2)
				{
					if(file_exists("../../images/user/".$gambarbaru))
					{
						unlink("../../images/user/".$gambarbaru);
					}
					echo "<script>alert('Password baru dan Pengulangannya tidak sama.')</script>";
					if(empty($act)){
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_tambah.php'>";
					}
					else{
						echo "<meta http-equiv='refresh' content='0; url=".$url."view/register.php'>";
					}
					
				}
				else
				{
					$sql = "insert into user(kode, nama, user_name, pass, posisi, aktif, gambar) values
											('$kode','$nama','$username','$pass','$posisi','$aktif','$gambarbaru')"; 
												
					$sqlexe = mysqli_query($koneksi, $sql);
					if($sqlexe) 
					{
						if(empty($act)){
							echo "<script>alert('Data Berhasi DiSimpan')</script>";
							echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_tambah.php'>";
						}
						else{
							echo "<script>alert('Data Berhasi DiSimpan, Tunggu Verifkasi Dari Administrator')</script>";
							echo "<meta http-equiv='refresh' content='0; url=".$url."view/index.php'>";
						}
					}
					else
					{
						if(file_exists("../../images/user/".$gambarbaru))
						{
							unlink("../../images/user/".$gambarbaru);
						}
						echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
						if(empty($act)){
						//echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_tambah.php'>";
						}
						else{
						//	echo "<meta http-equiv='refresh' content='0; url=".$url."view/register.php'>";
						}
					}
				}
			}
			else
			{

				if(file_exists("../../images/user/".$gambarbaru))
					{
						unlink("../../images/user/".$gambarbaru);
					}
				echo "<script>alert('Password Belum Diisi.')</script>";
				if(empty($act)){
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_tambah.php'>";
				}
				else{
					echo "<meta http-equiv='refresh' content='0; url=".$url."view/register.php'>";
				}

			}
		}
		else
		{
			echo "<script>alert('Maaf, Foto/Gambar gagal terupload')</script>";
			if(empty($act)){
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_tambah.php'>";
					}
			else{
				echo "<meta http-equiv='refresh' content='0; url=".$url."view/register.php'>";
			}
		}
	}
	else
	{
		if($pass!="")
		{
			if($pass != $pass2)
			{
				echo "<script>alert('Password baru dan Pengulangannya tidak sama.')</script>";
				if(empty($act)){
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_tambah.php'>";
					}
				else{
					echo "<meta http-equiv='refresh' content='0; url=".$url."view/register.php'>";
				}
				
			}
			else
			{
				$sql = "insert into user(kode, nama, user_name, pass, posisi, aktif) values
											('$kode','$nama','$username','$pass','$posisi','$aktif')";  
											
				$sqlexe = mysqli_query($koneksi, $sql);
				if($sqlexe) 
				{
					if(empty($act)){
						echo "<script>alert('Data Berhasi DiSimpan')</script>";
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_tambah.php'>";
					}
					else{
						echo "<script>alert('Data Berhasi DiSimpan, Tunggu Verifkasi Dari Administrator')</script>";
						echo "<meta http-equiv='refresh' content='0; url=".$url."view/index.php'>";
					}
				}
				else
				{
					echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
					if(empty($act)){
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_tambah.php'>";
					}
					else{
						echo "<meta http-equiv='refresh' content='0; url=".$url."view/register.php'>";
					}
				}
			}
		}
		else
		{
			echo "<script>alert('Password Belum Diisi.')</script>";
			if(empty($act)){
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_tambah.php'>";
					}
			else{
				echo "<meta http-equiv='refresh' content='0; url=".$url."view/register.php'>";
			}
		}
	}
	
	
?>