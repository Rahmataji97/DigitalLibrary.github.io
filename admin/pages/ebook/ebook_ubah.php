	<!DOCTYPE html>
<?php 
	
	session_start(); 
	include "../../../config/koneksi.php";
	$username 	= '';
	$name 		= '';
	$log 		= '';
	$pos		= '';
	if (isset($_SESSION['status']))
	{
		if($_SESSION['status'] !="login")
		{
			header("Location: ".$url."view/login");
		}
		else
		{
			$username 	= $_SESSION['username'];
			$name 		= $_SESSION['name'];
			$log 		= $_SESSION['status'];
			$pos		= $_SESSION['posisi'];
			$id			= $_GET['id'];
			if($pos!="admin")
			{
				header("Location: ".$url."view/login");
			}
		}
	}
	else
	{
		header("Location: ".$url."view/login");
	}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Digital Library | Edit E-Book</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $url ?>admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $url ?>admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $url ?>admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url ?>admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $url; ?>admin/index.php" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  
 <?php include ("../../sidebar.php"); ?>
  


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit E-Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $url; ?>admin/index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="ebook.php">E-Book</a></li>
			  <li class="breadcrumb-item active">Edit E-Book</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
		  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit E-Book</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo $url;?>control/ebook/con_ebook_ubah.php" enctype="multipart/form-data">
                <div class="card-body">
				<?php
				  
				  $sql = "select ebook.id, ebook.kode_ebook, ebook.judul, ebook.deskripsi,penerbit.nama as penerbit, ebook.penulis, ebook.rekomended,
						ebook.isbn, ebook.tahun_terbit, kategori.nama as kategori, ebook.gambar, ebook.file_upload from ebook 
						join kategori on ebook.kategori_id=kategori.id 
						join penerbit on ebook.penerbit_id=penerbit.id where ebook.id=$id 
						order by ebook.judul";
				$tampil = mysqli_query($koneksi,$sql);
				foreach($tampil as $row)
				{
				?>
				  <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Code</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $row['kode_ebook']; ?>" placeholder="E-Book Code" required>
                  </div>
			      <div class="form-group">
                    <label for="exampleInputFile">Title</label>
                    <input type="text" class="form-control" id="judul" name="judul"  value="<?php echo $row['judul']; ?>" placeholder="Title" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputFile">Description</label><br/>
                    <textarea rows="4" cols="50" id="deskripsi" name="deskripsi" ><?php echo $row['deskripsi']; ?></textarea>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputFile">Kategori</label><br/>
                    <select name="kategori_id">
						<?php
							$sqlx=mysqli_query($koneksi, "select * from kategori order by nama");
							foreach($sqlx as $rw)
							{
								if($rw['nama']==$row['kategori']){
						?>
								<option value=<?php echo $rw['id']; ?> selected='selected'><?php echo $rw['nama']; ?></option>
						<?php
								}
								else{
						?>
								<option value=<?php echo $rw['id']; ?>><?php echo $rw['nama']; ?></option>
						<?php
								}
							}
						?>
					</select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Sub Kategori</label><br/>
                    <select name="sub_id">
						<?php
							$sqlx=mysqli_query($koneksi, "select * from sub_kategori order by nama");
							foreach($sqlx as $rw)
							{
								if($rw['nama']==$row['sub_kategori']){
						?>
								<option value=<?php echo $rw['id']; ?> selected='selected'><?php echo $rw['nama']; ?></option>
						<?php
								}
								else{
						?>
								<option value=<?php echo $rw['id']; ?>><?php echo $rw['nama']; ?></option>
						<?php
								}
							}
						?>
					</select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputFile">Author</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo $row['penulis']; ?>" placeholder="Author" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputFile">Publisher</label><br/>
                    <select name="penerbit_id">
						<?php
							$sqlx=mysqli_query($koneksi, "select * from penerbit order by nama");
							foreach($sqlx as $rw)
							{
								if($rw['nama']==$row['penerbit']){
						?>
								<option value=<?php echo $rw['id']; ?> selected='selected'><?php echo $rw['nama']; ?></option>
						<?php
								}
								else{
						?>
								<option value=<?php echo $rw['id']; ?>><?php echo $rw['nama']; ?></option>
						<?php
								}
							}
						?>
					</select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputFile">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $row['isbn']; ?>" placeholder="ISBN">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputFile">Year</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $row['tahun_terbit']; ?>" placeholder="Year">
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputFile">Recomended</label>
					<?php if($row['rekomended']=='1') { ?>
						<p><input type='checkbox' name='rekomended' value='1' checked='checked' />Recomended E-Book</p>
					<?php } else{ ?>
						<p><input type='checkbox' name='rekomended' value='1' />Recomended E-Book</p>
					<?php } ?>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputFile">File E-Book : <?php echo $row['file_upload']; ?></label>
                    <input type="hidden" class="form-control" id="file_upload_old" name="file_upload_old" value="<?php echo $row['file_upload']; ?>">
                  </div>
				  <div class="form-group">
						<label for="exampleInputFile">Change File E-Book</label><br/>
                        <input type="file" name="file_upload">
                  </div>
				  
				  
                  <div class="form-group">
						<label for="exampleInputFile">Pict. Cover (375px x 512px)</label><br/>
                        <input type="file" name="gambar">
                  </div>
				  <div class="form-group">
                    <input type="hidden" class="form-control" value="<?php echo $row['gambar']; ?>" id="gambar_old" name="gambar_old">
                  </div>
				  <div class="form-group">
					<img src="<?php echo $url; ?>images/ebook/<?php echo $row['gambar']; ?>" width="250px" height="250px" /> 
				  </div>
				<?php } ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">   
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
			<div class="card-body"> 
				<a title='Add Data' href='ebook.php'><button class="btn btn-danger">Back</button>
			</div>
		  </div>
		</div>
	  </div>
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2020 <a href="#">Digital Library</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $url ?>admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $url ?>admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $url ?>admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $url ?>admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $url ?>admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $url ?>admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url ?>admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $url ?>admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
