<?php
	include "../../config/koneksi.php";
	$kode_ebook	 = $_POST['kode'];
	$judul		 = $_POST['judul'];
	$kategori_id = $_POST['kategori_id']; 
	$sub_id      = $_POST['sub_id']; 
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
	$gambar		 = $_FILES['gambar']['name'];
	$tmp		 = $_FILES['gambar']['tmp_name'];
	$gambarbaru = date('dmYHis').$gambar;
	$path = "../../images/ebook/".$gambarbaru;
	
	$fileupload	 = $_FILES['file_upload']['name'];
	$filetmp	 = $_FILES['file_upload']['tmp_name'];
	$filebaru = date('dmYHis').$fileupload;
	$pathfile = "../../file_ebook/".$filebaru;
	
	
	
	
	if($gambar)
	{
		if(move_uploaded_file($tmp, $path))
		{
			if(move_uploaded_file($filetmp, $pathfile))
			{
				$sql = "insert into ebook(kode_ebook,	
											judul,		
											kategori_id,
                                            sub_id,
											deskripsi, 	 
											isbn,		 
											penulis,	 
											penerbit_id, 
											tahun_terbit,		 
											rekomended,	 
											gambar,
											file_upload) 
									 values('$kode_ebook',	
											'$judul',		
											$kategori_id,
                                            $sub_id,
											'$deskripsi', 	 
											'$isbn',		 
											'$penulis',	 
											$penerbit_id, 
											$tahun,		 
											'$rekomended',	 
											'$gambarbaru',
											'$filebaru')";
				$sqlexe = mysqli_query($koneksi, $sql);
				if($sqlexe) 
				{
					echo "<script>alert('Data Berhasil Disimpan!')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_tambah.php'>";
				}
				else
				{
					echo "<script>alert('Data Gagal Disimpan!')</script>";
					unlink("../../images/ebook/".$gambarbaru);
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_tambah.php'>";
				}
			}
			else
			{
				echo "<script>alert('File E-book gagal disimpan!')</script>";
				unlink("../../images/ebook/".$gambarbaru);
				echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_tambah.php'>";
			}
		}
		else
		{
			echo "<script>alert('Gambar Tidak Bisa DiUpload, Penyimpanan Data Gagal!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_tambah.php'>";
		}
	}
	else
	{
		
		if(move_uploaded_file($filetmp, $pathfile))
			{
				$sql = "insert into ebook(kode_ebook,	
											judul,		
											kategori_id,
                                            sub_id,
											deskripsi, 	 
											isbn,		 
											penulis,	 
											penerbit_id, 
											tahun_terbit,		 
											rekomended,
											file_upload) 
									 values('$kode_ebook',	
											'$judul',		
											$kategori_id,
                                            $sub_id,
											'$deskripsi', 	 
											'$isbn',		 
											'$penulis',	 
											$penerbit_id, 
											$tahun,		 
											'$rekomended',
											'$filebaru')";
				$sqlexe = mysqli_query($koneksi, $sql);
				if($sqlexe) 
				{
					echo "<script>alert('Data Berhasil Disimpan!')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_tambah.php'>";
				}
				else
				{
					echo "<script>alert('Data Gagal Disimpan!')</script>";
					echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_tambah.php'>";
				}
			}
		else
			{
				echo "<script>alert('File E-book gagal disimpan!,".$pathfile."')</script>";
				//echo "<meta http-equiv='refresh' content='0; url=".$url."admin/pages/ebook/ebook_tambah.php'>";
			}
	}
	
	
?>