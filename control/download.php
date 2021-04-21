<?php 
	session_start();
	include "../config/koneksi.php";
	$userid = 0;
	if(isset($_SESSION['userid'])){
		$userid = $_SESSION['userid'];
	}
	
    if (isset($_GET['filename'])) {
    $filename    = $_GET['filename'];
	$idbook		 = $_GET['id'];
	
	$tgl		 = date('Y-m-d');

    $back_dir    ="../file_ebook/";
    $file = $back_dir.$filename;
     
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: private');
            header('Pragma: private');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            
			$sqlb = "insert into download(ebook_id,user_id,tanggal)values($idbook,$userid,'$tgl')";
			mysqli_query($koneksi,$sqlb);
			
			
            exit;
			
			
        } 
        else {
            $_SESSION['pesan'] = "Oops! File - $filename - not found ...";
            header("location:../view/index.php");
        }
    }
?>