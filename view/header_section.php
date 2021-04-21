<header id="header" class="navbar-wrapper">
<div class="container">
<div class="row">
    <nav class="navbar navbar-default">
<div class="col-sm-12">
<div class="header-topbar hidden-sm hidden-xs">
<div class="row">
<div class="col-sm-6">
<div class="topbar-info">
    <a href="tel:(021) 7806700"><i class="fa fa-phone"></i>(021) 7806700</a>
        <span>/</span>
    <a href="mailto:info@unas.ac.id"><i class="fa fa-envelope"></i>info@unas.ac.id</a>
</div>
</div>
<div class="col-sm-6">
<div class="topbar-links">
    <?php if($log=='login') { ?>
       <a href="<?php echo $url.'control/con_logout.php'; ?>"><i class="fa fa-lock"></i>Logout</a>
    <?php } else { ?>
	   <a href="<?php echo $url.'view/login/index.php'; ?>"><i class="fa fa-lock"></i>Login / Register</a>
    <?php } ?>
</div>
</div>
</div>
</div>
<div class="bg-light">
<div class="row">
<div class="col-sm-4">
<div class="navbar-header">
<div class="navbar-brand">
    <h1>
        <a href="<?php echo $url ?>index.php">
        <img src="<?php echo $url ?>images/unas2.png" alt="Digital Library" />
        </a>
    </h1>
</div>
</div>
</div>
<div class="col-sm-8">
<div class="navbar-collapse hidden-sm hidden-xs">
<ul class="nav navbar-nav">
    <li><a href="<?php echo $url ?>view/index.php">Home</a></li>
    <li class="dropdown">
    <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">E-Books Catalog</a>
        <ul class="dropdown-menu">
            <li><a href="list_view.php?kode=2">All Category</a></li>
			    <?php
                    $sql = "select sub_kategori.id, sub_kategori.nama, 
				            sub_kategori.deskripsi, kategori.id as kategori_id, kategori.nama as kategori_nama, sub_kategori.gambar from sub_kategori 
						      join kategori on sub_kategori.kategori_id=kategori.id
                            order by nama";
				    $sqlexe = mysqli_query($koneksi, $sql);
				foreach($sqlexe as $row)
				{
			    ?>
            <li><a href="list_view.php?kode=4&kategori=<?php echo $row['kategori_id']; ?>"><?php echo $row['kategori_nama']; ?></a>
            <ul class="dropdown-menu-right">
                <li><a href="list_view.php?kode=6&sub_kategori=<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></a></li>
            </ul>
            </li>
			<?php } ?>
        </ul>
    </li>  
    <li class="dropdown">
		<a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Web Link</a>
                <ul class="dropdown-menu">
                    <li><a href="https://www.unas.ac.id" target="_blank">Universitas Nasional</a></li>
                    <li><a href="https://webkuliah.unas.ac.id" target="_blank">Web Kuliah</a></li>
			<li><a href="http://apps.unas.ac.id:8080/login.do" target="_blank">Akademik Online</a></li>
			<li><a href="http://www.perpusnas.go.id/beranda/" target="_blank">Perpustakaan Nasional RI</a></li>
                </ul>
	</li>
	<?php 
	if($log=='login')
	{
	?>
		<li><a href="<?php echo $url ?>view/bookmark_view.php">Bookmark</a></li>
	<?php
	}
	?>
            <li><a href="<?php echo $url ?>view/tentang_kami.php">About US</a></li>
            <li><a href="<?php echo $url ?>view/kontak.php">Contact</a></li>
        </ul>
    </div>
</div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md">
                        <a href="<?php echo $url ?>#mobile-menu"><i class="fa fa-navicon"></i></a>
                            <div id="mobile-menu">
                                <ul>
<li class="mobile-title">
    <h4>Navigation</h4>
    <a href="<?php echo $url ?>#" class="close"></a>
</li>
<li><a href="<?php echo $url ?>view/index.php">Home</a></li>
<li>
    <a href="#">E-Books Catalog</a>
    <ul>
        <li><a href="#">All Category</a></li>
        <?php
	$sql = "select * from kategori order by nama";
	$sqlexe = mysqli_query($koneksi, $sql);
	foreach($sqlexe as $row)
	{
?>
<li><a href="#"><?php echo $row['nama']; ?></a></li>
<?php } ?>
</ul>
</li>                                 
<li class="dropdown">
<a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Web Link</a>
<ul class="dropdown-menu">
<li><a href="https://www.unas.ac.id" target="_blank">Universitas Nasional</a></li>
<li><a href="https://webkuliah.unas.ac.id" target="_blank">Web Kuliah</a></li>
<li><a href="http://apps.unas.ac.id:8080/login.do" target="_blank">Akademik Online</a></li>
<li><a href="http://www.perpusnas.go.id/beranda/" target="_blank">Perpustakaan Nasional RI</a></li>
</ul>
</li>
<li><a href="<?php echo $url ?>services.html">About US</a></li>
<li><a href="<?php echo $url ?>contact.html">Contact</a></li>
</ul>
</div>
</div>
</nav>
</div>
</div>
</header>