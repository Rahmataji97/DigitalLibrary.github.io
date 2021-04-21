<?php
	include "../config/koneksi.php";
	$key = $_POST['keywords'];
	header("location:".$url."view/list_view.php?kode=5&keyword=".$key);
?>