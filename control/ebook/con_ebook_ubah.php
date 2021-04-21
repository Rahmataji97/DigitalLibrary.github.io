<?php
	include "../../config/koneksi.php";
	$id			 = $_POST['id'];
	$kode_ebook	 = $_POST['kode'];
	$judul		 = $_POST['judul'];
	$kategori_id = $_POST['kategori_id']; 
	$sub_id = $_POST['sub_id']; 
	$deskripsi 	 = $_POST['deskripsi'];
	$isbn		 = $_POST['isbn'];
	$penulis	 = $_POST['penulis'];
	$penerbit_id = $_POST['penerbit_id']; 
	$tahun		 = $_POST['tahun'];
	$rekomended	 = '0';
	if(isset($_POST['rekomended']))
	{
		$rekomended	 = $_POST['rekomended'];
	}
	$gambarold 	= $_POST['gambar_old'];
	$gambar		= $_FILES['gambar']['name'];
	$tmp		= $_FILES['gambar']['tmp_name'];
	$gambarbaru = date('dmYHis').$gambar;
	$path = "../../images/ebook/".$gambarbaru;
	
	$fileuploadold = $_POST['file_upload_old'];
	$fileupload	 = $_FILES['file_upload']['name'];
	$filetmp	 = $_FILES['file_upload']['tmp_name'];
	$filebaru = date('dmYHis').$fileupload;
	$pathfile = "../../file_ebook/".$filebaru;
	
	if($_FILES['gambar']['name'])
	{
		if(move_uploaded_file($tmp, $path))
		{
			if($_FILES['file_upload']['name'])
			{
				if(move_uploaded_file($filetmp, $pathfile))
				{
					$sql = "update ebook set kode_ebook='$kode_ebook',	
												judul='$judul',
                                                kategori_id=$kategori_id ,
												sub_id=$sub_id , 
												deskripsi='$deskripsi', 	 
												isbn='$isbn',		 
												penulis='$penulis',	 
												penerbit_id=$penerbit_id, 
												tahun_terbit=$tahun,		 
												rekomended='$rekomended',	 
												gambar='$gambarbaru',
												file_upload='$filebaru' where id=$id"; 
												
					$sqlexe = mysqli_query($koneksi, $sql);
					if($sqlexe) 
					{
						if(!empty($gambarold)){
							if(file_exists("../../images/ebook/".$gambarold))
							{
								unlink("../../images/ebook/".$gambarold);
							}
						}
						if(!empty($fileuploadold)){
							if(file_exists("../../file_ebook/".$fileuploadold))
							{
								unlink("../../file_ebook/".$fileuploadold);
							}
						}
						echo "<script>alert('Data Berhasi Diupdate')</script>";
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook.php'>";
					}
					else
					{
						unlink("../../file_ebook/".$filebaru);
						unlink("../../images/ebook/".$gambarbaru);
						echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_ubah.php?id=".$id."'>";
					}
				}
				else
				{
					unlink("../../file_ebook/".$gambarbaru);
					echo "<script>alert('Maaf, file e-book gagal ter-upload.')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_ubah.php?id=".$id."'>";
				}
			}
			else
			{
				$sql = "update ebook set kode_ebook='$kode_ebook',	
												judul='$judul',		
												kategori_id=$kategori_id , sub_id=$sub_id ,deskripsi='$deskripsi', 	 
												isbn='$isbn',		 
												penulis='$penulis',	 
												penerbit_id=$penerbit_id, 
												tahun_terbit=$tahun,		 
												rekomended='$rekomended',	 
												gambar='$gambarbaru' where id=$id"; 
												
				$sqlexe = mysqli_query($koneksi, $sql);
				if($sqlexe) 
				{
					if(!empty($gambarold)){
							if(file_exists("../../images/ebook/".$gambarold))
							{
								unlink("../../images/ebook/".$gambarold);
							}
						}
					echo "<script>alert('Data Berhasi Diupdate')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook.php'>";
				}
				else
				{
					unlink("../../file_ebook/".$filebaru);
					echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_ubah.php?id=".$id."'>";
				}
			}
		}
		else
		{
			echo "<script>alert('Maaf, Foto/Gambar gagal terupload')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_ubah.php?id=".$id."'>";
		}
	}
	else
	{
		if($_FILES['file_upload']['name'])
			{
				if(move_uploaded_file($filetmp, $pathfile))
				{
					$sql = "update ebook set kode_ebook='$kode_ebook',	
								judul='$judul',		
								kategori_id=$kategori_id , 
                                sub_id=$sub_id , deskripsi='$deskripsi', 	 
												isbn='$isbn',		 
												penulis='$penulis',	 
												penerbit_id=$penerbit_id, 
												tahun_terbit=$tahun,		 
												rekomended='$rekomended',
												file_upload='$filebaru' where id=$id"; 
												
					$sqlexe = mysqli_query($koneksi, $sql);
					if($sqlexe) 
					{
						if(!empty($fileuploadold)){
							if(file_exists("../../file_ebook/".$fileuploadold))
							{
								unlink("../../file_ebook/".$fileuploadold);
							}
						}
						echo "<script>alert('Data Berhasi Diupdate')</script>";
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook.php'>";
					}
					else
					{
						unlink("../../file_ebook/".$filebaru);
						echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
						echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_ubah.php?id=".$id."'>";
					}
				}
				else
				{
					echo "<script>alert('Maaf, file e-book gagal ter-upload.')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_ubah.php?id=".$id."'>";
				}
			}
			else
			{
				$sql = "update ebook set kode_ebook='$kode_ebook',	
												judul='$judul',		
												kategori_id=$kategori_id , 
												sub_id=$sub_id,
                                                deskripsi='$deskripsi', 	 
												isbn='$isbn',		 
												penulis='$penulis',	 
												penerbit_id=$penerbit_id, 
												tahun_terbit=$tahun,		 
												rekomended='$rekomended' where id=$id"; 
												
				$sqlexe = mysqli_query($koneksi, $sql);
				if($sqlexe) 
				{
					echo "<script>alert('Data Berhasi Diupdate')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook.php'>";
				}
				else
				{
					echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_ubah.php?id=".$id."'>";
				}
			}
	}
	
	
?>