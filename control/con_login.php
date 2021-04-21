<?php 
include '../config/koneksi.php';
 
$username = $_POST['username'];
$password = md5($_POST['pass']);

$sql = "select * from user where user_name='$username' and pass='$password'";
$login = mysqli_query($koneksi, $sql);
$cek =  mysqli_fetch_row($login);
$aktif = 0;
foreach($login as $rowx)
{
	$aktif = $rowx['aktif'];
}
 
if($cek){
	if($aktif==0)
	{
		echo "<scrip>alert('User tidak aktif.')</script>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."view/login'>";
	}
	else
		
	{
		foreach($login as $row)
		{
			session_start();
			$_SESSION['username'] = $row['user_name'];
			$_SESSION['name'] = $row['nama'];
			$_SESSION['posisi'] = $row['posisi'];
			$_SESSION['status'] = "login";
			$_SESSION['userid'] = $row['id'];
			$_SESSION['gambar'] = $row['gambar'];
			if($row['posisi']=='admin')
			{
				header("location:".$url."admin");
			}
			else
			{
				header("location:".$url."view");
			}
		}
	}
}else{
	header("location:".$url."view/login");	

}
 
?>