<?php
	include "../../config/koneksi.php";
	$id			 = $_POST['id'];
	$kode		 = $_POST['kode'];
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
		
	
	if(isset($_POST['aktif']))
	{
		$aktif	 = $_POST['aktif'];
	}
	$gambarold 	= $_POST['gambar_old'];
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
						if(!empty($gambarbaru)){
							if(file_exists("../../images/user/".$gambarbaru))
							{
								unlink("../../images/user/".$gambarbaru);
							}
						}
						echo "<script>alert('Password baru dan Pengulangannya tidak sama.')</script>";
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_ubah.php?id=".$id."'>";
						
					}
					else
					{
						$sql = "update user set kode='$kode',	
													nama='$nama',		
													user_name='$username', 
													pass='$pass',		 
													posisi='$posisi',	 
													aktif='$aktif', 	 
													gambar='$gambarbaru' where id=$id"; 
													
						$sqlexe = mysqli_query($koneksi, $sql);
						if($sqlexe) 
						{
							if(!empty($gambarold)){
								if(file_exists("../../images/user/".$gambarold))
								{
									unlink("../../images/user/".$gambarold);
								}
							}
			
							echo "<script>alert('Data Berhasi Diupdate')</script>";
							echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user.php'>";
						}
						else
						{
							if(!empty($gambarbaru)){
								if(file_exists("../../images/user/".$gambarbaru))
								{
									unlink("../../images/user/".$gambarbaru);
								}
							}
							echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
							echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_ubah.php?id=".$id."'>";
						}
					}
			}
			else
			{
					$sql = "update user set kode='$kode',	
								nama='$nama',		
								user_name='$username',
								posisi='$posisi',	 
								aktif='$aktif', 	 
								gambar='$gambarbaru' where id=$id"; 
												
				$sqlexe = mysqli_query($koneksi, $sql);
				if($sqlexe) 
				{
					if(!empty($gambarold)){
						if(file_exists("../../images/user/".$gambarold))
						{
							unlink("../../images/user/".$gambarold);
						}
					}
					echo "<script>alert('Data Berhasi Diupdate')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user.php'>";
				}
				else
				{
					if(!empty($gambarbaru)){
						if(file_exists("../../images/user/".$gambarbaru))
						{
							unlink("../../images/user/".$gambarbaru);
						}
					}
					echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_ubah.php?id=".$id."'>";
				}
			}
		}
		else
		{
			echo "<script>alert('Maaf, Foto/Gambar gagal terupload')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_ubah.php?id=".$id."'>";
		}
	}
	else
	{
		if($pass!="")
		{
			if($pass != $pass2)
			{
				echo "<script>alert('Password baru dan Pengulangannya tidak sama.')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_ubah.php?id=".$id."'>";
				
			}
			else
			{
				$sql = "update user set kode='$kode',	
						nama='$nama',		
						user_name='$username', 
						pass='$pass',		 
						posisi='$posisi',	 
						aktif='$aktif' where id=$id";  
											
				$sqlexe = mysqli_query($koneksi, $sql);
				if($sqlexe) 
				{
					echo "<script>alert('Data Berhasi Diupdate')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user.php'>";
				}
				else
				{
					echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_ubah.php?id=".$id."'>";
				}
			}
		}
		else
		{
			$sql = "update user set kode='$kode',	
					nama='$nama',		
					user_name='$username',
					posisi='$posisi',	 
					aktif='$aktif' where id=$id";  
										
			$sqlexe = mysqli_query($koneksi, $sql);
			if($sqlexe) 
			{
				echo "<script>alert('Data Berhasi Diupdate')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user.php'>";
			}
			else
			{
				echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/user/user_ubah.php?id=".$id."'>";
			}
		}
	}
	
	
?>