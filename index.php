<?php
	include "config/koneksi.php";
	session_start();
	if (isset($_SESSION['status']))
	{
		$log = $_SESSION['status'];
		$pos = $_SESSION['posisi'];
		if($log=="login")
    {
if($pos=="admin" || $pos=="staff") {
    header("Location: ".$url."admin");
} else
    { header("Location: ".$url."view"); }
} else
    { header("Location: ".$url."view/login"); }
} else
    { header("Location: ".$url."view"); }
    die();
?>