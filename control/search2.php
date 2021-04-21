<?php
	include "../config/koneksi.php";
	$key = $_POST['sub_kategori'];
	header("location:".$url."view/list_view.php?kode=6&sub_kategori=".$key);
?>